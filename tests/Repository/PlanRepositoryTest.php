<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;

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
     */
    public function recuperate_ReturnId()
    {
        $planId = $this->planRepository->recuperate(PersonStub1::ID);
        $this->assertEquals(ApiClientMock::$id, $planId);
    }

    public function setUp()
    {
        $this->planRepository = new PlanRepository();
        $this->planRepository->setApiClient(new ApiClientMock());
    }
}
