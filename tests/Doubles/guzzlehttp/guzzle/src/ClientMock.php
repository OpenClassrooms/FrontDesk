<?php

namespace OpenClassrooms\FrontDesk\Doubles\guzzlehttp\guzzle\src;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
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
    public static $params;

    public function __construct()
    {
        self::$response = null;
        self::$resource = null;
        self::$params = [];
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

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($resource)
    {
        return new Response();
    }
}
