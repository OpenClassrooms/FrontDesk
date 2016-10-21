<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Doubles\Models\PlanStub1;
use OpenClassrooms\FrontDesk\Gateways\PlanGateway;
use OpenClassrooms\FrontDesk\Models\Plan;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanGatewayMock implements PlanGateway
{
    /**
     * @var Plan[]
     */
    public static $plans;

    public function __construct()
    {
        self::$plans = new PlanStub1();
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        return self::$plans;
    }
}
