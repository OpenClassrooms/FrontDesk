<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonGateway
{
    /**
     * @param int $page
     *
     * @return Person[]
     */
    public function findAll($page = null);

    /**
     * @param string $query
     *
     * @return []
     */
    public function findAllByQuery($query = null);

    /**
     * @return int
     */
    public function insert(Person $person);

    /**
     * @return int
     */
    public function update(Person $person);
}
