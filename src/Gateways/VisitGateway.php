<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitGateway
{
    /**
     * @param int    $personId
     * @param string $from     ISO8601String
     * @param string $to       ISO8601String
     *
     * @return Visit[]
     */
    public function findAllByPersonId($personId, $from = null, $to = null);

    /**
     * @param int  $visitId
     * @param bool $personNotification
     */
    public function deleteById($visitId, $personNotification = false);
}
