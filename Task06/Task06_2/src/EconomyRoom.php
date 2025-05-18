<?php

namespace App;

class EconomyRoom extends Room
{
    public function getDescription(): string
    {
        return "Эконом";
    }

    public function getCost(): float
    {
        return 1000;
    }
}
