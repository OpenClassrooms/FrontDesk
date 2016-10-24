<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

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

    public function __construct(array $plans = [])
    {
        self::$plans = $plans;
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        return self::$plans;
    }
}
