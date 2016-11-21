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
    public static $people = [];

    /**
     * @param array $person
     */
    public function __construct(array $person = [])
    {
        self::$id = 0;
        self::$people = $person;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll($page = null)
    {
        return self::$people;
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByQuery($query = null)
    {
        return self::$people;
    }

    /**
     * {@inheritdoc}
     */
    public function insert(Person $person)
    {
        self::$people[self::$id] = $person;

        return self::$id;
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person)
    {
        self::$people[self::$id] = $person;

        return self::$id;
    }
}
