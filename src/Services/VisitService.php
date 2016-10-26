<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitService
{
    /**
     * @param int $personId
     *
     * @return Visit[]
     */
    public function getVisits($personId, $from = null, $to = null);

    /**
     * @param int $visitId
     */
    public function deleteVisit($visitId);
}