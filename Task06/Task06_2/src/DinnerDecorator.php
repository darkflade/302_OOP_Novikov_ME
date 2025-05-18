<?php

namespace App;

class DinnerDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ", с ужином";
    }

    public function getCost(): float
    {
        return $this->room->getCost() + 800;
    }
}
