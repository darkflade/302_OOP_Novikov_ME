<?php

namespace App;

class StandardRoom extends Room
{
    public function getDescription(): string
    {
        return "Стандарт";
    }

    public function getCost(): float
    {
        return 2000;
    }
}
