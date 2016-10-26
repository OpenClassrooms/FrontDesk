<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Person;
use PHPUnit_Framework_Assert as Assert;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait PersonTestCase
{
    protected function assertPerson(Person $expected, Person $actual)
    {
        Assert::assertEquals($expected->getAddress(), $actual->getAddress());
        Assert::assertEquals($expected->getCustomFields(), $actual->getCustomFields());
        Assert::assertEquals($expected->getEmail(), $actual->getEmail());
        Assert::assertEquals($expected->getFirstName(), $actual->getFirstName());
        Assert::assertEquals($expected->getJoinedAt(), $actual->getJoinedAt());
        Assert::assertEquals($expected->getLastName(), $actual->getLastName());
        Assert::assertEquals($expected->getPhone(), $actual->getPhone());
    }
}
