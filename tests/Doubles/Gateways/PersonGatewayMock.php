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
     * @param Person[] $people
     */
    public function __construct(array $people = [])
    {
        self::$id = 0;
        self::$people = $people;
    }

    /**
     * {@inheritdoc}
     */
    public function find($personId)
    {
        return self::$people;
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
