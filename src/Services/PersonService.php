<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonService
{
    /**
     * @return int
     */
    public function create(Person $person);

    /**
     * @param int $personId
     *
     * @return int
     */
    public function update(Person $person, $personId);
}
