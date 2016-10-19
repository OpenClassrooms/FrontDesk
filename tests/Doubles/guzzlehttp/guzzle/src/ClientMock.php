<?php

namespace OpenClassrooms\FrontDesk\Doubles\guzzlehttp\guzzle\src;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ClientMock extends Client
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
    public static $config;

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
    public function post($resource, $params)
    {
        self::$resource = $resource;
        self::$params = $params;

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function get($resource)
    {
        self::$resource = $resource;
        self::$config = [];

        return self::$response;
    }
}
