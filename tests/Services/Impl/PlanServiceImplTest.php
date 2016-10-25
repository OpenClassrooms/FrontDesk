<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\PlanGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PlanStub1;
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
    public function getPlans_ReturnPlans()
    {
        $plans = $this->service->getPlans(PersonStub1::ID);
        $this->assertEquals(0, count($plans) - count(PlanGatewayMock::$plans));

        $i = 0;
        foreach ($plans as $plan) {
            $planStub = '\OpenClassrooms\FrontDesk\Doubles\Models\PlanStub'.++$i;
            $this->assertPlan(new $planStub(), $plan);
        }
    }

    public function setUp()
    {
        $this->service = new PlanServiceImpl();
        $this->service->setPlanGateway(new PlanGatewayMock([PlanStub1::ID => new PlanStub1()]));
    }
}
