<?php

namespace OpenClassrooms\FrontDesk\Gateways;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface StaffMemberGateway
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
