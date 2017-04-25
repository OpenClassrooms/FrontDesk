<?php

namespace OpenClassrooms\FrontDesk\Repository;

use Carbon\Carbon;
use OpenClassrooms\FrontDesk\Doubles\Client\Impl\CoreApiClientMock;
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
        CoreApiClientMock::$response = json_encode(["plans" => [new PlanStub1()], "total_count" => 1]);

        $plans = $this->planRepository->findAllByPersonId(PersonStub1::ID);

        $i = 0;
        foreach ($plans as $plan) {
            $planStub = '\OpenClassrooms\FrontDesk\Doubles\Models\PlanStub'.++$i;
            $this->assertPlan(new $planStub(), $plan);
        }
    }

    public function setUp()
    {
        Carbon::setTestNow(Carbon::now());
        $this->planRepository = new PlanRepository();
        $this->planRepository->setCoreApiClient(new CoreApiClientMock());
        $this->planRepository->setPlanBuilder(new PlanBuilderImpl());
    }

    public function tearDown()
    {
        Carbon::setTestNow();
    }
}
