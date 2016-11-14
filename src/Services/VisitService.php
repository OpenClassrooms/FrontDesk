<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitService
{
    /**
     * @param int    $personId
     * @param string $from ISO8601String
     * @param string $to   ISO8601String
     *
     * @return Visit[]
     */
    public function getVisits($personId, $from = null, $to = null);

    /**
     * @param int       $visitId
     * @param bool|null $personNotification
     */
    public function deleteVisit($visitId, $personNotification = false);
}
