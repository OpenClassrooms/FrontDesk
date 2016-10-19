<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Plan;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PlanService
{
    /**
     * @param int $personId
     *
     * @return Plan[]
     */
    public function getPlans($personId);
}
