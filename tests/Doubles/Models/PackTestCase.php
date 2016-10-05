<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Pack;
use PHPUnit_Framework_Assert as Assert;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait PackTestCase
{
    protected function assertPack(Pack $expected, Pack $actual)
    {
        Assert::assertEquals($expected->getCount(), $actual->getCount());
        Assert::assertEquals($expected->getEndDate(), $actual->getEndDate());
        Assert::assertEquals($expected->getPersonIds(), $actual->getPersonIds());
        Assert::assertEquals($expected->getStartDate(), $actual->getStartDate());
    }
}
