<?php

namespace App;

class LuxuryRoom extends Room
{
    public function getDescription(): string
    {
        return "Люкс";
    }

    public function getCost(): float
    {
        return 3000;
    }
}
