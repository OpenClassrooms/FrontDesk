<?php

namespace Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PackStub1;
use OpenClassrooms\FrontDesk\Models\Impl\PackBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Impl\PackImpl;
use OpenClassrooms\FrontDesk\Repository\PackRepository;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PackRepository
     */
    private $packRepository;

    /**
     * @test
     */
    public function insert_ReturnPackId()
    {
        ApiClientMock::$response = PackStub1::ID;
        $pack = $this->buildPack();
        $result = $this->packRepository->insert($pack);

        $this->assertEquals(PackStub1::ID, $result);
        $this->assertEquals(PackRepository::RESOURCE_NAME, ApiClientMock::$resource);
        $this->assertEquals($pack->toArray(), ApiClientMock::$params);
    }

    /**
     * @return PackImpl
     */
    private function buildPack()
    {
        $packBuilder = new PackBuilderImpl();

        return $packBuilder
            ->create()
            ->withCount(PackStub1::COUNT)
            ->withEndDate(new \DateTime(PackStub1::END_DATE))
            ->withPersonIds(PackStub1::PERSON_IDS)
            ->withStartDate(new \DateTime(PackStub1::START_DATE))
            ->build();
    }

    protected function setUp()
    {
        $this->packRepository = new PackRepository();
        $this->packRepository->setApiClient(new ApiClientMock());
    }
}
