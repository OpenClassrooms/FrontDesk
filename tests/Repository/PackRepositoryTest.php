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
    const PACK_PRODUCT_ID = '1111111';

    /**
     * @var PackRepository
     */
    private $packRepository;

    /**
     * @test
     */
    public function insert_ReturnPackId()
    {
        ApiClientMock::$response = json_encode(['packs' => [0 => ['id' => PackStub1::ID]]]);
        $pack = $this->buildPack();
        $result = $this->packRepository->insert($pack, self::PACK_PRODUCT_ID);

        $this->assertEquals(PackStub1::ID, $result);
        $this->assertEquals('desk/pack_products/'.self::PACK_PRODUCT_ID.'/'.PackRepository::RESOURCE_NAME, ApiClientMock::$resource);
        $this->assertEquals(json_encode($pack), json_encode(ApiClientMock::$params));
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
