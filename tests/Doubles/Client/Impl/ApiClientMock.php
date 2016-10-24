<?php

namespace OpenClassrooms\FrontDesk\Doubles\Client\Impl;

use GuzzleHttp\Psr7\Response;
use OpenClassrooms\FrontDesk\Client\Impl\ApiClientImpl;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ApiClientMock extends ApiClientImpl
{
    /**
     * @var int
     */
    public static $id;

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
        self::$id = null;
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

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function get($resourceName)
    {
        self::$resource = $resourceName;

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($resourceName)
    {
        return new Response();
    }
}
