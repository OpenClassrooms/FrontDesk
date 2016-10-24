<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Plan;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PlanGateway
{
    /**
     * @param integer $personId
     *
     * @return Plan[]
     */
    public function findAllByPersonId($personId);
}
