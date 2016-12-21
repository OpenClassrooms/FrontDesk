<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\VisitGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\VisitStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\VisitTestCase;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitServiceImplTest extends \PHPUnit_Framework_TestCase
{
    use VisitTestCase;

    const FROM = '2016-10-24 15:30:06';

    const TO = '2016-10-30 15:30:06';

    /**
     * @var VisitServiceImpl
     */
    private $service;

    /**
     * @test
     */
    public function getVisitsWithoutParameters_ReturnVisits()
    {
        $visits = $this->service->getVisits(PersonStub1::ID);
        $this->assertVisits($visits);
    }

    /**
     * @test
     */
    public function getVisitsWithParameters_ReturnVisits()
    {
        list($from, $to) = $this->initFromAndTo();
        $visits = $this->service->getVisits(PersonStub1::ID, $from, $to);
        $this->assertVisits($visits);
    }

    /**
     * @return array
     */
    private function initFromAndTo()
    {
        $from = new \DateTime(self::FROM);
        $to = new \DateTime(self::TO);

        return [$from, $to];
    }

    /**
     * @test
     */
    public function deleteVisit()
    {
        $this->service->deleteVisit(VisitStub1::ID);
        $this->assertEmpty(VisitGatewayMock::$visits);
    }

    public function setUp()
    {
        $this->service = new VisitServiceImpl();
        $this->service->setVisitGateway(new VisitGatewayMock([VisitStub1::ID => new VisitStub1()]));
    }
}
