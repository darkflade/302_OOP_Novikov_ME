<?php

declare(strict_types=1);

function runTest(): void
{
    // String representation test
    $v1 = new Vector(1, 2, 3);
    echo "Ожидается: (1; 2; 3)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL;

    // Adding test
    $v2 = new Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    echo "Ожидается: (2; 6; 1)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    // Subtraction test
    $v4 = $v1->sub($v2);
    echo "Ожидается: (0; -2; 5)" . PHP_EOL;
    echo "Получено: " . $v4 . PHP_EOL;

    // Multiplication by a number test
    $number = 10;
    $v5 = $v1->product($number);
    echo "Ожидается: (10; 20; 30)" . PHP_EOL;
    echo "Получено: " . $v5 . PHP_EOL;

    // Scalar product test
    $v6 = $v1->scalarProduct($v2);
    echo "Ожидается: 3" . PHP_EOL;
    echo "Получено: " . $v6 . PHP_EOL;

    // Vector product test
    $v7 = $v1->vectorProduct($v2);
    echo "Ожидается: (-16; -5; 2)" . PHP_EOL;
    echo "Получено: " . $v7 . PHP_EOL;

    //Invalid arguments test
    try {
        $v3 = new Vector("aboba", 1, 5);
    } catch (TypeError $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }
}
