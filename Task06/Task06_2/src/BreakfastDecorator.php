<?php

namespace App;

class BreakfastDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ", с завтраком \"шведский стол\"";
    }

    public function getCost(): float
    {
        return $this->room->getCost() + 500;
    }
}
