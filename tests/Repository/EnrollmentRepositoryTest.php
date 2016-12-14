<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ReportingApiClientMock;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const DATA_RESPONSE = 'data';

    /**
     * @var EnrollmentRepository
     */
    private $enrollmentRepository;

    /**
     * @test
     */
    public function postQuery_ReturnResult()
    {
        ReportingApiClientMock::$response = json_encode(['data' => ['attributes' => ['rows' => self::DATA_RESPONSE]]]);

        $result = $this->enrollmentRepository->query(['email']);

        $this->assertEquals(self::DATA_RESPONSE, $result);
    }

    protected function setUp()
    {
        $this->enrollmentRepository = new EnrollmentRepository();
        $this->enrollmentRepository->setReportingApiClient(new ReportingApiClientMock());
    }
}
