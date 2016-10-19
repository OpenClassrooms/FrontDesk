<?php

namespace OpenClassrooms\FrontDesk\Gateways;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PlanGateway
{
    /**
     * @param integer $personId
     *
     * @return integer
     */
    public function recuperate($personId);
}
