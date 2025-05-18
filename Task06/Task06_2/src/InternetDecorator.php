<?php

namespace App;

class InternetDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ", с выделенным Интернетом";
    }

    public function getCost(): float
    {
        return $this->room->getCost() + 100;
    }
}
