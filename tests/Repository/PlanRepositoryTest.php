<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PlanStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PlanTestCase;
use OpenClassrooms\FrontDesk\Models\Impl\PlanBuilderImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanRepositoryTest extends \PHPUnit_Framework_TestCase
{
    use PlanTestCase;

    /**
     * @var PlanRepository
     */
    private $planRepository;

    /**
     * @test
     */
    public function findAllByPersonId_ReturnPlans()
    {
        ApiClientMock::$response = json_encode(["plans" => [new PlanStub1()], "total_count" => 1]);

        $plans = $this->planRepository->findAllByPersonId(PersonStub1::ID);

        $i = 0;
        foreach ($plans as $plan) {
            $planStub = '\OpenClassrooms\FrontDesk\Doubles\Models\PlanStub'.++$i;
            $this->assertPlan(new $planStub(), $plan);
        }
    }

    public function setUp()
    {
        $this->planRepository = new PlanRepository();
        $this->planRepository->setApiClient(new ApiClientMock());
        $this->planRepository->setPlanBuilder(new PlanBuilderImpl());
    }
}
