<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitGateway
{
    /**
     * @param int $personId
     * @param int $from
     * @param int $to
     *
     * @return Visit[]
     */
    public function findAllByPersonId($personId, $from = null, $to = null);
}
