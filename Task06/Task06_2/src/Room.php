<?php

namespace App;

abstract class Room
{
    abstract public function getDescription(): string;
    abstract public function getCost(): float;
}
