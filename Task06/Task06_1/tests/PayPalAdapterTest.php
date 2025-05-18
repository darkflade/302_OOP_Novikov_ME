<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\PayPal;
use App\PayPalAdapter;

class PayPalAdapterTest extends TestCase
{
    public function testCollectMoneyReturnsTrueOnSuccess()
    {
        $pp = new PayPal('customer@aol.com', 'password');
        $adapter = new PayPalAdapter($pp);

        $this->assertTrue(
            $adapter->collectMoney(100),
            'PayPalAdapter должен вернуть true при получении "Paypal Success!"'
        );
    }

    public function testCollectMoneyReturnsFalseOnFailure()
    {
        $stub = $this->createStub(PayPal::class);
        $stub->method('transfer')->willReturn('Failure: unauthorized');

        $adapter = new PayPalAdapter($stub);
        $this->assertFalse(
            $adapter->collectMoney(200),
            'PayPalAdapter должен вернуть false, если ответ не равен "Paypal Success!"'
        );
    }
}
