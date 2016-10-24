<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Doubles\Models\VisitStub1;
use OpenClassrooms\FrontDesk\Gateways\VisitGateway;
use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitGatewayMock implements VisitGateway
{
    /**
     * @var Visit[]
     */
    public static $visits;

    public function __construct()
    {
        self::$visits = new VisitStub1();
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        return self::$visits;
    }
}
