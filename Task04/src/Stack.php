<?php

namespace App;

class Stack implements StackInterface
{
    private array $stack;

    public function __construct(...$elements)
    {
        $this->stack = [];
        $this->push(...$elements);
    }

    public function push(...$elements): void
    {
        foreach ($elements as $element) {
            array_push($this->stack, $element);
        }
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_pop($this->stack);
    }

    public function top(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function copy(): StackInterface
    {
        $newStack = new Stack();
        $newStack->stack = $this->stack;
        return $newStack;
    }

    public function __toString(): string
    {
        if ($this->isEmpty()) {
            return '[]';
        }
        return '[' . implode('->', array_reverse($this->stack)) . ']';
    }

    public function compareStrings(string $str1, string $str2): bool
    {
        $stack1 = $this->processString($str1);
        $stack2 = $this->processString($str2);

        while (!$stack1->isEmpty() && !$stack2->isEmpty()) {
            if ($stack1->pop() !== $stack2->pop()) {
                return false;
            }
        }
        return $stack1->isEmpty() && $stack2->isEmpty();
    }

    private function processString(string $str): Stack
    {
        $stack = new Stack();
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] === '#') {
                if (!$stack->isEmpty()) {
                    $stack->pop();
                }
            } else {
                $stack->push($str[$i]);
            }
        }
        return $stack;
    }
}
