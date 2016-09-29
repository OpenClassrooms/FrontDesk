<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonGateway
{
    /**
     * @return int
     */
    public function insert(Person $person);
}
