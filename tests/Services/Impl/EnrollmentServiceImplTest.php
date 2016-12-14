<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\EnrollmentGatewayMock;
use OpenClassrooms\FrontDesk\Services\EnrollmentService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentServiceImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EnrollmentService
     */
    protected $service;

    /**
     * @test
     */
    public function postQuery_ReturnResponse()
    {
        EnrollmentGatewayMock::$response = ['post query response'];

        $response = $this->service->query();

        $this->assertEquals(EnrollmentGatewayMock::$response, $response);
    }

    protected function setUp()
    {
        $this->service = new EnrollmentServiceImpl();
        $this->service->setEnrollmentGateway(new EnrollmentGatewayMock());
    }
}
