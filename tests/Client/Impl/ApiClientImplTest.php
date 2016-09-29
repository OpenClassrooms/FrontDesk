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

    const BLOG = 'http://yourblogdomainname.com';

    const RESOURCE = 'resource';

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
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock->method('getContents')->willReturn('string');
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);
        ClientMock::$response = $responseMock;

        $response = $this->apiClient->post(self::RESOURCE, self::PARAMS);

        $this->assertEquals(ClientMock::$response->getBody()->getContents(), $response);
        $this->assertEquals(self::RESOURCE, ClientMock::$resource);
        $this->assertEquals(['form_params' => self::PARAMS], ClientMock::$params);
    }

    protected function setUp()
    {
        $this->apiClient = new ApiClientImpl(self::KEY, self::BLOG);
        $this->guzzleClientMock = new ClientMock();
        $this->setPropertyToObject($this->apiClient, 'guzzle', $this->guzzleClientMock);
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
