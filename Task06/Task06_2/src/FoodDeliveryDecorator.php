<?php

namespace App;

class FoodDeliveryDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ", с доставкой еды в номер";
    }

    public function getCost(): float
    {
        return $this->room->getCost() + 300;
    }
}
