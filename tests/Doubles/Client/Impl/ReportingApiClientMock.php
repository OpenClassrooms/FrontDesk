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

    /**
     * @var int
     */
    private $index = 0;

    public function __construct()
    {
        $this->index = 0;
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

        return self::$response[$this->index++];
    }
}
