<?php

namespace App;

abstract class RoomDecorator extends Room
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getDescription(): string
    {
        return $this->room->getDescription();
    }

    public function getCost(): float
    {
        return $this->room->getCost();
    }
}
