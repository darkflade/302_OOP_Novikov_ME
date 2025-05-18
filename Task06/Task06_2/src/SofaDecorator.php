<?php

namespace App;

class SofaDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ", с дополнительным диваном";
    }

    public function getCost(): float
    {
        return $this->room->getCost() + 500;
    }
}
