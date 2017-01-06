<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\StaffMemberGatewayMock;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class StaffMemberServiceImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StaffMemberServiceImpl
     */
    protected $service;

    /**
     * @test
     */
    public function postQuery_ReturnResponse()
    {
        StaffMemberGatewayMock::$response = ['post query response'];

        $response = $this->service->query();

        $this->assertEquals(StaffMemberGatewayMock::$response, $response);
    }

    protected function setUp()
    {
        $this->service = new StaffMemberServiceImpl();
        $this->service->setStaffMemberGateway(new StaffMemberGatewayMock());
    }
}
