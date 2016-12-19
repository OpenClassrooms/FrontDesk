<?php

namespace OpenClassrooms\FrontDesk\Doubles\Client\Impl;

use OpenClassrooms\FrontDesk\Client\Impl\CoreApiClientImpl;
use OpenClassrooms\FrontDesk\Client\NotFoundException;
use OpenClassrooms\FrontDesk\Client\UnprocessableEntityException;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class CoreApiClientMock extends CoreApiClientImpl
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

    /**
     * @var int
     */
    public static $statusCode;

    public function __construct()
    {
        self::$id = null;
        self::$response = null;
        self::$params = [];
        self::$resource = null;
        self::$statusCode = null;
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
    public function put($resourceName, $resourceData)
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
        if (self::$statusCode === 404) {
            throw new NotFoundException();
        }
        self::$resource = $resourceName;

        return self::$response;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($resourceName)
    {
        if (self::$statusCode === 404) {
            throw new NotFoundException();
        } elseif (self::$statusCode === 422) {
            throw new UnprocessableEntityException();
        }
        self::$resource = $resourceName;

        return self::$response;
    }
}
