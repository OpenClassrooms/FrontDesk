<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonPackService
{
    /**
     * @return [int]array
     */
    public function create(Person $person, \DateTime $startDate, \DateTime $endDate = null);
}
