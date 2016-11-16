<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Gateways\PersonGateway;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonGatewayMock implements PersonGateway
{
    /**
     * @var int
     */
    public static $id = 0;

    /**
     * @var Person[]
     */
    public static $person = [];

    /**
     * @param array $person
     */
    public function __construct(array $person = [])
    {
        self::$id = 0;
        self::$person = $person;
    }

    /**
     * {@inheritdoc}
     */
    public function insert(Person $person)
    {
        self::$person[++self::$id] = $person;

        return self::$id;
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person)
    {
        self::$person[++self::$id] = $person;

        return self::$id;
    }
}
