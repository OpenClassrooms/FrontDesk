<?php

namespace OpenClassrooms\FrontDesk\Services;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PlanService
{
    /**
     * @param $personId
     *
     * @return integer
     */
    public function pickUp($personId);
}
