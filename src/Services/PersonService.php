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
     * @param int $page
     *
     * @return Person[]
     */
    public function getPeople($page = null);

    /**
     * @param string $query
     *
     * @return []
     */
    public function findAllByQuery($query = null);

    /**
     * @return int
     */
    public function update(Person $person);
}
