<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\EconomyRoom;
use App\StandardRoom;
use App\LuxuryRoom;
use App\InternetDecorator;
use App\SofaDecorator;
use App\BreakfastDecorator;
use App\DinnerDecorator;

class RoomTest extends TestCase
{
    public function testEconomyRoom()
    {
        $room = new EconomyRoom();

        $this->assertEquals(
            "Эконом" . "1000",
            $room->getDescription() . $room->getCost(),
            "Эконом номер не соответствует ожиданиям"
        );
    }

    public function testStandardRoomWithInternet()
    {
        $room = new InternetDecorator(new StandardRoom());

        $this->assertEquals(
            "Стандарт, с выделенным Интернетом" . "2100",
            $room->getDescription() . $room->getCost(),
            "Стандарт с интернетом не соответствует ожиданиям"
        );
    }

    public function testLuxuryRoomWithSofaAndDinner()
    {
        $room = new DinnerDecorator(new SofaDecorator(new LuxuryRoom()));

        $this->assertEquals(
            "Люкс, с дополнительным диваном, с ужином" . "4300",
            $room->getDescription() . $room->getCost(),
            "Люкс с диваном и ужином не соответствует ожиданиям"
        );
    }

    public function testEconomyRoomWithAllServices()
    {
        $room = new BreakfastDecorator(
            new DinnerDecorator(
                new InternetDecorator(
                    new SofaDecorator(
                        new EconomyRoom()
                    )
                )
            )
        );

        $this->assertEquals(
            "Эконом, с дополнительным диваном, с выделенным Интернетом, с ужином, с завтраком \"шведский стол\"" . "2900",
            $room->getDescription() . $room->getCost(),
            "Эконом с полным набором услуг не соответствует ожиданиям"
        );
    }
}
