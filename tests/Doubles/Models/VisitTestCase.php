<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Visit;
use PHPUnit_Framework_Assert as Assert;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait VisitTestCase
{
    public function assertVisit(Visit $expected, Visit $actual)
    {
        Assert::assertEquals($expected->getCancelledAt(), $actual->getCancelledAt());
        Assert::assertEquals($expected->getCreatedAt(), $actual->getCreatedAt());
        Assert::assertEquals($expected->getCompletedAt(), $actual->getCompletedAt());
        Assert::assertEquals($expected->getId(), $actual->getId());
        Assert::assertEquals($expected->getEventOccurrence(), $actual->getEventOccurrence());
        Assert::assertEquals($expected->getNoShowAt(), $actual->getNoShowAt());
        Assert::assertEquals($expected->isPaid(), $actual->isPaid());
        Assert::assertEquals($expected->getPaidForBy(), $actual->getPaidForBy());
        Assert::assertEquals($expected->getRegisteredAt(), $actual->getRegisteredAt());
        Assert::assertEquals($expected->getStatus(), $actual->getStatus());
    }
}
