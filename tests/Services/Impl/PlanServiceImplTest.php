<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\PlanGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanServiceImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PlanServiceImpl
     */
    private $service;

    /**
     * @test
     */
    public function pickUp_ReturnId()
    {
        $planId = $this->service->pickUp(PersonStub1::ID);
        $this->assertEquals(PlanGatewayMock::$id, $planId);
    }

    public function setUp()
    {
        $this->service = new PlanServiceImpl();
        $this->service->setPlanGateway(new PlanGatewayMock());
    }
}
