<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\EnrollmentsGatewayMock;
use OpenClassrooms\FrontDesk\Services\EnrollmentsService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentsServiceImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EnrollmentsService
     */
    protected $service;

    /**
     * @test
     */
    public function postQuery_ReturnResponse()
    {
        EnrollmentsGatewayMock::$response = ['post query response'];

        $response = $this->service->query();

        $this->assertEquals(EnrollmentsGatewayMock::$response, $response);
    }

    protected function setUp()
    {
        $this->service = new EnrollmentsServiceImpl();
        $this->service->setEnrollmentsGateway(new EnrollmentsGatewayMock());
    }
}
