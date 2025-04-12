<?php

declare(strict_types=1);

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncateEmptyString(): void
    {
        $truncater = new Truncater();
        $this->assertEquals('', $truncater->truncate(''), 'Пустая строка должна остаться пустой');
    }

    public function testTruncateWithDefaultOptions(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $this->assertEquals($text, $truncater->truncate($text), 'Текст короче 50 символов не должен обрезаться');
    }

    public function testTruncateWithCustomLength(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['length' => 10]);
        $this->assertEquals(mb_substr($text, 0, 10) . '...', $result, 'Текст должен обрезаться до 10 символов с ...');
    }

    public function testTruncateWithLengthGreaterThanText(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['length' => 50]);
        $this->assertEquals($text, $result, 'Текст короче 50 символов не должен обрезаться');
    }

    public function testTruncateWithNegativeLength(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['length' => -10]);
        $this->assertEquals('', $result, 'Отрицательная длина должна возвращать пустую строку');
    }

    public function testTruncateWithCustomSeparator(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['length' => 10, 'separator' => '*']);
        $this->assertEquals(mb_substr($text, 0, 10) . '*', $result, 'Текст должен обрезаться
        с кастомным разделителем *');
    }

    public function testTruncateWithOnlySeparator(): void
    {
        $truncater = new Truncater();
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['separator' => '*']);
        $this->assertEquals($text, $result, 'Текст короче 50 символов не должен обрезаться с новым разделителем');

        $longText = str_repeat('a', 51);
        $result = $truncater->truncate($longText, ['separator' => '*']);
        $this->assertEquals(mb_substr($longText, 0, 50) . '*', $result, 'Длинный текст должен
        обрезаться с разделителем *');
    }

    public function testTruncateWithCustomConstructorOptions(): void
    {
        $truncater = new Truncater(['length' => 10]);
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text);
        $this->assertEquals(mb_substr($text, 0, 10) . '...', $result, 'Конструктор должен установить length=10');
    }

    public function testTruncateWithCustomConstructorAndMethodOptions(): void
    {
        $truncater = new Truncater(['length' => 10, 'separator' => '*']);
        $text = 'Новиков Максим Евгеньевич';
        $result = $truncater->truncate($text, ['length' => 5]);
        $this->assertEquals(mb_substr($text, 0, 5) . '*', $result, 'Опции метода должны переопределять конструктор');
    }
}
