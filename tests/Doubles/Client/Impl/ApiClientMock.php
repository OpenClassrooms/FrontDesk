<?php

namespace OpenClassrooms\FrontDesk\Doubles\Client\Impl;

use OpenClassrooms\FrontDesk\Client\Impl\ApiClientImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ApiClientMock extends ApiClientImpl
{
    /**
     * @var int
     */
    public static $id = 87932;

    /**
     * @var string
     */
    public static $response;

    /**
     * @var string
     */
    public static $resource;

    /**
     * @var array
     */
    public static $params;

    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function post($resourceName, $resourceData)
    {
        self::$resource = $resourceName;
        self::$params = $resourceData;

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function get($resourceName)
    {
        self::$resource = $resourceName;

        return self::$id;
    }
}
