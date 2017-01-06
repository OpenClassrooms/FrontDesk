<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\StaffMemberGateway;
use OpenClassrooms\FrontDesk\Services\StaffMemberService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class StaffMemberServiceImpl implements StaffMemberService
{
    /**
     * @var StaffMemberGateway
     */
    private $staffMemberGateway;

    /**
     * @inheritDoc
     */
    public function query(array $field = [], array $filter = [], $limit = 100)
    {
        return $this->staffMemberGateway->query($field, $filter, $limit);
    }

    public function setStaffMemberGateway(StaffMemberGateway $staffMemberGateway)
    {
        $this->staffMemberGateway = $staffMemberGateway;
    }
}
