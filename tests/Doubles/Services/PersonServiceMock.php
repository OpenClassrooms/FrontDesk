<?php

namespace OpenClassrooms\FrontDesk\Doubles\Services;

use OpenClassrooms\FrontDesk\Models\Person;
use OpenClassrooms\FrontDesk\Services\PersonService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonServiceMock implements PersonService
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
     * @return int
     */
    public function create(Person $person)
    {
        self::$person[++self::$id] = $person;

        return self::$id;
    }
}
