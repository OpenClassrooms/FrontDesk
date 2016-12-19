<?php

namespace Client\Impl;

use OpenClassrooms\FrontDesk\Client\ClientFactory;
use OpenClassrooms\FrontDesk\Client\Impl\ClientFactoryImpl;
use OpenClassrooms\FrontDesk\Client\Impl\CoreApiClientImpl;
use OpenClassrooms\FrontDesk\Client\Impl\ReportingApiClientImpl;

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
    protected $clientFactory;

    /**
     * @test
     */
    public function createCoreApi_ReturnClient()
    {
        $client = $this->clientFactory->createCoreApi(self::KEY, self::TOKEN);

        $this->assertInstanceOf(CoreApiClientImpl::class, $client);
        $guzzle = $this->getGuzzle($client);
        $this->assertEquals(self::KEY.'.frontdeskhq.com', $guzzle->getConfig('base_uri')->getHost());
        $this->assertArrayHasKey('Authorization', $guzzle->getConfig('headers'));
        $this->assertEquals('Bearer '.self::TOKEN, $guzzle->getConfig('headers')['Authorization']);
    }

    /**
     * @param ReportingApiClientImpl|CoreApiClientImpl $client
     *
     * @return \GuzzleHttp\Client
     */
    private function getGuzzle($client)
    {
        $reflectionClass = new \ReflectionClass($client);
        $guzzleProperty = $reflectionClass->getProperty('client');
        $guzzleProperty->setAccessible(true);

        return $guzzleProperty->getValue($client);
    }

    /**
     * @test
     */
    public function createReportingApi_ReturnClient()
    {
        $client = $this->clientFactory->createReportingApi(self::KEY, self::TOKEN);

        $this->assertInstanceOf(ReportingApiClientImpl::class, $client);
        $guzzle = $this->getGuzzle($client);
        $this->assertEquals(self::KEY.'.frontdeskhq.com', $guzzle->getConfig('base_uri')->getHost());
        $this->assertArrayHasKey('Authorization', $guzzle->getConfig('headers'));
        $this->assertEquals('Bearer '.self::TOKEN, $guzzle->getConfig('headers')['Authorization']);
    }

    protected function setUp()
    {
        $this->clientFactory = new ClientFactoryImpl();
    }
}
