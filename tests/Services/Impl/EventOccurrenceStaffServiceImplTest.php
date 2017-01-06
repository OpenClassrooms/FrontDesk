<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\EventOccurrenceStaffGatewayMock;
use OpenClassrooms\FrontDesk\Services\EventOccurrenceStaffService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EventOccurrenceStaffServiceImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventOccurrenceStaffService
     */
    protected $service;

    /**
     * @test
     */
    public function postQuery_ReturnResponse()
    {
        EventOccurrenceStaffGatewayMock::$response = ['post query response'];

        $response = $this->service->query();

        $this->assertEquals(EventOccurrenceStaffGatewayMock::$response, $response);
    }

    protected function setUp()
    {
        $this->service = new EventOccurrenceStaffServiceImpl();
        $this->service->setEventOccurrenceStaffGateway(new EventOccurrenceStaffGatewayMock);
    }
}
