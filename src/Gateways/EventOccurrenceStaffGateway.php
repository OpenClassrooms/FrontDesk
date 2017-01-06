<?php

namespace OpenClassrooms\FrontDesk\Gateways;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface EventOccurrenceStaffGateway
{
    /**
     * @param array $fields
     * @param array $filter
     * @param int   $limit
     *
     * @return array
     */
    public function query(array $fields = [], array $filter = [], $limit = 100);
}
