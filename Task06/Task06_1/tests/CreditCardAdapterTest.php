<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\CreditCard;
use App\CreditCardAdapter;

class CreditCardAdapterTest extends TestCase
{
    public function testCollectMoneyReturnsTrueOnSuccess()
    {
        $card = new CreditCard(1234567890123456, '09/22');
        $adapter = new CreditCardAdapter($card);

        $this->assertTrue(
            $adapter->collectMoney(100),
            'CreditCardAdapter должен вернуть true при корректном коде авторизации'
        );
    }

    public function testCollectMoneyReturnsFalseOnFailure()
    {
        $stub = $this->createStub(CreditCard::class);
        $stub->method('authorizeTransaction')->willReturn('Error: insufficient funds');

        $adapter = new CreditCardAdapter($stub);
        $this->assertFalse(
            $adapter->collectMoney(50),
            'CreditCardAdapter должен вернуть false, если строка не содержит "Authorization code:"'
        );
    }
}
