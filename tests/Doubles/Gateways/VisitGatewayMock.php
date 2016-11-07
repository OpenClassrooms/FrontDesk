<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

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

    public function __construct(array $visits = [])
    {
        self::$visits = $visits;
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId, $from = null, $to = null)
    {
        return self::$visits;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($visitId, $personNotification = false)
    {
        unset(self::$visits[$visitId]);
    }
}
