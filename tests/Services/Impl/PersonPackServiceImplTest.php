<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Services\PackServiceMock;
use OpenClassrooms\FrontDesk\Doubles\Services\PersonServiceMock;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonPackServiceImplTest extends \PHPUnit_Framework_TestCase
{
    const PACK_PRODUCT_ID = 1234;

    const COUNT = 999999;

    const START_DATE = '2016-06-25';

    const ENDED_DATE = '2016-08-01';

    /**
     * @var PersonPackServiceImpl
     */
    private $service;

    /**
     * @test
     */
    public function create_returnId()
    {
        $result = $this->service->create(new PersonStub1(), new \DateTime(self::START_DATE), new \DateTime(self::ENDED_DATE));
        $this->assertEquals(1, $result['personId']);
        $this->assertEquals(1, $result['packId']);
    }

    protected function setUp()
    {
        $this->service = new PersonPackServiceImpl(self::PACK_PRODUCT_ID, self::COUNT);
        $this->service->setPersonService(new PersonServiceMock());
        $this->service->setPackService(new PackServiceMock());
    }
}
