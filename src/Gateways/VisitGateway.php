<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitGateway
{
    /**
     * @param integer $personId
     *
     * @return Visit[]
     */
    public function findAllByPersonId($personId);
}
