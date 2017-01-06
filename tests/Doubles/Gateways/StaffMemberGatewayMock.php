<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Gateways\StaffMemberGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class StaffMemberGatewayMock implements StaffMemberGateway
{
    /**
     * @var array
     */
    public static $response = [];

    public function __construct()
    {
        self::$response = [];
    }

    /**
     * {@inheritdoc}
     */
    public function query(array $fields = [], array $filter = [], $limit = 100)
    {
        return self::$response;
    }
}
