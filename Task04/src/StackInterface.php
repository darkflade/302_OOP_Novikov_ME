<?php

namespace App;

interface StackInterface
{
    public function push(...$elements): void;

    public function pop(): mixed;

    public function top(): mixed;

    public function isEmpty(): bool;

    public function copy(): StackInterface;

    public function __toString(): string;
}
