<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PlanStub1;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PlanRepository
     */
    private $planRepository;

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\FrontDesk\Services\Impl\InvalidTotalCountException
     */
    public function checkTotalCount()
    {
        ApiClientMock::$response = json_encode(["plans" => [new PlanStub1()], "total_count" => 0]);

        $this->planRepository->findAllByPersonId(PersonStub1::ID);
    }

    /**
     * @test
     */
    public function findAllByPersonId_ReturnPlans()
    {
        ApiClientMock::$response = json_encode(["plans" => [new PlanStub1()], "total_count" => 1]);

        $plans = $this->planRepository->findAllByPersonId(PersonStub1::ID);
        $this->assertEquals(json_encode([new PlanStub1()]), json_encode($plans));
    }

    public function setUp()
    {
        $this->planRepository = new PlanRepository();
        $this->planRepository->setApiClient(new ApiClientMock());
    }
}
