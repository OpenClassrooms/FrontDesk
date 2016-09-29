<?php

namespace Client\Impl;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Client\ClientFactory;
use OpenClassrooms\FrontDesk\Client\Impl\ClientFactoryImpl;
use OpenClassrooms\FrontDesk\Client\Impl\ApiClientImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ClientFactoryImplTest extends \PHPUnit_Framework_TestCase
{
    const KEY = 'key';

    const TOKEN = 'token';

    /**
     * @var ClientFactory
     */
    private $clientFactory;

    /**
     * @test
     */
    public function create_ReturnClient()
    {
        $client = $this->clientFactory->create(self::KEY, self::TOKEN);

        $this->assertInstanceOf(ApiClientImpl::class, $client);
        $guzzle = $this->getGuzzle($client);
        $this->assertEquals('https://' . self::KEY . '.frontdeskhq.com/api/v2/', $guzzle->getConfig('base_uri'));
        $this->assertArrayHasKey('Authorization', $guzzle->getConfig('headers'));
        $this->assertEquals('Bearer ' . self::TOKEN, $guzzle->getConfig('headers')['Authorization']);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getGuzzle(ApiClient $client)
    {
        $reflectionClass = new \ReflectionClass($client);
        $guzzleProperty = $reflectionClass->getProperty('guzzle');
        $guzzleProperty->setAccessible(true);

        return $guzzleProperty->getValue($client);
    }

    protected function setUp()
    {
        $this->clientFactory = new ClientFactoryImpl();
    }
}
