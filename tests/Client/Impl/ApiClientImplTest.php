<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use OpenClassrooms\FrontDesk\Doubles\guzzlehttp\guzzle\src\ClientMock;
use PHPUnit_Framework_MockObject_MockObject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ApiClientImplTest extends \PHPUnit_Framework_TestCase
{
    const KEY = '123apikey';

    const TOKEN = 'jlsdhfxgcwljhgcjhgwxb';

    const RESOURCE_NAME = 'resource';

    const PARAMS = ['param1' => 'myParam1'];

    const NOT_FOUND_RESPONSE = 404;

    const UNPROCESSABLE_ENTITY_RESPONSE = 422;

    const OK_RESPONSE = 200;

    /**
     * @var ApiClientImpl
     */
    private $apiClient;

    /**
     * @var StreamInterface | PHPUnit_Framework_MockObject_MockObject
     */
    private $guzzleClientMock;

    /**
     * @test
     */
    public function postResource_ReturnResponse()
    {
        $this->initMock();
        $response = $this->apiClient->post(self::RESOURCE_NAME, self::PARAMS);

        $this->assertEquals(ClientMock::$response->getBody()->getContents(), $response);
        $this->assertEquals(self::RESOURCE_NAME, ClientMock::$resource);
        $this->assertEquals(['json' => self::PARAMS], ClientMock::$params);
    }

    private function initMock()
    {
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock->method('getContents')->willReturn('string');
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);
        ClientMock::$response = $responseMock;
    }

    /**
     * @test
     */
    public function getResource_ReturnResponse()
    {
        $this->initMock();
        $response = $this->apiClient->get(self::RESOURCE_NAME);

        $this->assertEquals(ClientMock::$response->getBody()->getContents(), $response);
        $this->assertEquals(self::RESOURCE_NAME, ClientMock::$resource);
    }

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\FrontDesk\Client\NotFoundException
     */
    public function notFoundResource_ThrowException()
    {
        ClientMock::$response = $this->buildResponse(self::NOT_FOUND_RESPONSE);
        $this->apiClient->delete(self::RESOURCE_NAME);
    }

    /**
     * @param int $statusCode
     */
    private function buildResponse($statusCode)
    {
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock->method('getContents')->willReturn('');
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);
        $responseMock->method('getStatusCode')->willReturn($statusCode);

        return $responseMock;
    }

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\FrontDesk\Client\UnprocessableEntityException
     */
    public function UnprocessableEntity_ThrowException()
    {
        ClientMock::$response = $this->buildResponse(self::UNPROCESSABLE_ENTITY_RESPONSE);
        $this->apiClient->delete(self::RESOURCE_NAME);
    }

    /**
     * @test
     */
    public function deleteResource_DoNothing()
    {
        ClientMock::$response = $this->buildResponse(self::OK_RESPONSE);
        $this->apiClient->delete(self::RESOURCE_NAME);

        $this->assertTrue(true);
    }

    protected function setUp()
    {
        $this->apiClient = new ApiClientImpl(self::KEY, self::TOKEN);
        $this->guzzleClientMock = new ClientMock();
        $this->setPropertyToObject($this->apiClient, 'client', $this->guzzleClientMock);
    }

    /**
     * @param object $object
     * @param string $propertyName
     * @param mixed  $propertyValue
     */
    private function setPropertyToObject($object, $propertyName, $propertyValue)
    {
        $reflectionClass = new \ReflectionClass($object);
        $guzzleProperty = $reflectionClass->getProperty($propertyName);
        $guzzleProperty->setAccessible(true);
        $guzzleProperty->setValue($object, $propertyValue);
    }
}
