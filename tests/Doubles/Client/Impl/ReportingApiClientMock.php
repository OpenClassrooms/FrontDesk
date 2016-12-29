<?php

namespace OpenClassrooms\FrontDesk\Doubles\Client\Impl;

use OpenClassrooms\FrontDesk\Client\Impl\ReportingApiClientImpl;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ReportingApiClientMock extends ReportingApiClientImpl
{
    /**
     * @var int
     */
    public static $index = 0;

    /**
     * @var ResponseInterface
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
        self::$index = 0;
        self::$response = null;
        self::$params = [];
        self::$resource = null;
    }

    /**
     * {@inheritdoc}
     */
    public function post($resourceName, $resourceData)
    {
        self::$resource = $resourceName;
        self::$params = $resourceData;
        self::$index = self::$index + 1;

        return self::$response[self::$index - 1];
    }
}
