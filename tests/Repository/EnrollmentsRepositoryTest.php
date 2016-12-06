<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ReportingApiClientMock;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentsRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const DATA_RESPONSE = 'data';

    /**
     * @var EnrollmentsRepository
     */
    private $enrollmentsRepository;

    /**
     * @test
     */
    public function postQuery_ReturnResult()
    {
        ReportingApiClientMock::$response = json_encode(['data' => ['attributes' => ['rows' => self::DATA_RESPONSE]]]);

        $result = $this->enrollmentsRepository->query(['email']);

        $this->assertEquals(self::DATA_RESPONSE, $result);
    }

    protected function setUp()
    {
        $this->enrollmentsRepository = new EnrollmentsRepository();
        $this->enrollmentsRepository->setReportingApiClient(new ReportingApiClientMock());
    }
}
