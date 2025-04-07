<?php

use App\Stack;

function runTest(): void
{
    // Test Stack methods
    $stack = new Stack(1, 2, 3);
    echo "Test __toString: " . ($stack->__toString() === '[3->2->1]' ? "Passed" : "Failed") . "\n";

    $stack->push(4, 5);
    echo "Test push: " . ($stack->__toString() === '[5->4->3->2->1]' ? "Passed" : "Failed") . "\n";

    echo "Test pop: " . ($stack->pop() === 5 ? "Passed" : "Failed") . "\n";
    echo "Test top: " . ($stack->top() === 4 ? "Passed" : "Failed") . "\n";

    $copy = $stack->copy();
    echo "Test copy: " . ($copy->__toString() === '[4->3->2->1]' ? "Passed" : "Failed") . "\n";

    $emptyStack = new Stack();
    echo "Test isEmpty: " . ($emptyStack->isEmpty() ? "Passed" : "Failed") . "\n";
    echo "Test pop on empty: " . ($emptyStack->pop() === null ? "Passed" : "Failed") . "\n";
    echo "Test top on empty: " . ($emptyStack->top() === null ? "Passed" : "Failed") . "\n";

    // Test compareStrings
    $stack = new Stack();
    $tests = [
        ['ab#c', 'ade##c', true],
        ['a#c', 'c', true],
        ['abc###', 'a#b#', true],
        ['ab##', '', true],
        ['', '', true],
        ['a', 'b', false],
        ['aboba','biba',false],
        ['ab###obabiba','abobabi##ba',false]
    ];

    foreach ($tests as $index => [$str1, $str2, $expected]) {
        $result = $stack->compareStrings($str1, $str2);
        echo "Test compareStrings #$index ('$str1' vs '$str2'): " .
            ($result === $expected ? "Passed" : "Failed") . "\n";
    }
}
