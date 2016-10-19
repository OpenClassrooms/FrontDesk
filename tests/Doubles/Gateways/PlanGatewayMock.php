<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Gateways\PlanGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanGatewayMock implements PlanGateway
{
    /**
     * @var int
     */
    public static $id = 1222;

    /**
     * {@inheritdoc}
     */
    public function recuperate($planId)
    {
        return self::$id;
    }
}
