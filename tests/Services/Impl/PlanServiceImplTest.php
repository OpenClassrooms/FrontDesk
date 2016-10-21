<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\PlanGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PlanTestCase;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanServiceImplTest extends \PHPUnit_Framework_TestCase
{
    use PlanTestCase;

    /**
     * @var PlanServiceImpl
     */
    private $service;

    /**
     * @test
     */
    public function getPlans_ReturnId()
    {
        $plan = $this->service->getPlans(PersonStub1::ID);
        $this->assertPlan(PlanGatewayMock::$plans, $plan);
    }

    public function setUp()
    {
        $this->service = new PlanServiceImpl();
        $this->service->setPlanGateway(new PlanGatewayMock());
    }
}
