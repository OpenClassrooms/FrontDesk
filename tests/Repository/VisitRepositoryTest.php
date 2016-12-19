<?php

namespace OpenClassrooms\FrontDesk\Repository;

use Carbon\Carbon;
use OpenClassrooms\FrontDesk\Doubles\Client\Impl\CoreApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\VisitStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\VisitTestCase;
use OpenClassrooms\FrontDesk\Models\Impl\VisitBuilderImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitRepositoryTest extends \PHPUnit_Framework_TestCase
{
    use VisitTestCase;

    const FROM = '2016-08-12 15:30:06';

    const NOT_FOUND_RESPONSE = 404;

    const TO = '2016-09-12 15:30:06';

    /**
     * @var VisitRepository
     */
    private $visitRepository;

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\FrontDesk\Client\NotFoundException
     */
    public function visitNotFound_ThrowException()
    {
        CoreApiClientMock::$statusCode = self::NOT_FOUND_RESPONSE;
        $this->visitRepository->findAllByPersonId(PersonStub1::ID);
    }

    /**
     * @test
     */
    public function findAllByPersonIdWithoutParameters_ReturnVisits()
    {
        CoreApiClientMock::$response = json_encode(['visits' => [new VisitStub1()], 'total_count' => 1]);

        $visits = $this->visitRepository->findAllByPersonId(PersonStub1::ID);
        $this->assertVisits($visits);
    }

    /**
     * @test
     */
    public function findAllByPersonIdWithParameters_ReturnVisits()
    {
        list($from, $to) = $this->initFromAndTo();
        CoreApiClientMock::$response = json_encode(['visits' => [new VisitStub1()], 'total_count' => 1]);

        $visits = $this->visitRepository->findAllByPersonId(PersonStub1::ID, $from, $to);
        $this->assertVisits($visits);
    }

    /**
     * @return array
     */
    private function initFromAndTo()
    {
        $from = new Carbon(self::FROM);
        $from = $from->toISO8601String();

        $to = new Carbon(self::TO);
        $to = $to->toISO8601String();

        return [$from, $to];
    }

    /**
     * @test
     */
    public function deleteById_DoNothing()
    {
        $this->visitRepository->deleteById(VisitStub1::ID, false);

        $this->assertTrue(true);
    }

    public function setUp()
    {
        $this->visitRepository = new VisitRepository();
        $this->visitRepository->setCoreApiClient(new CoreApiClientMock());
        $this->visitRepository->setVisitBuilder(new VisitBuilderImpl());
    }
}
