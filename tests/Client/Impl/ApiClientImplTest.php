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
     */
    public function deleteResource_ReturnNull()
    {
        $response = $this->apiClient->delete(self::RESOURCE_NAME);

        $this->assertNull($response);
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
