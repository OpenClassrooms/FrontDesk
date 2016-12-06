<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OpenClassrooms\FrontDesk\Client\ReportingApiClient;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ReportingApiClientImpl implements ReportingApiClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param string $key
     * @param string $token
     */
    public function __construct($key, $token)
    {
        $this->client = new Client(
            [
                'base_uri' => 'https://'.$key.'.frontdeskhq.com/',
                'headers'  => [
                    'Authorization' => "Bearer $token",
                    'Content-Type'  => ' application/vnd.api+json',
                ],
            ]
        );
    }


    /**
     * {@inheritdoc}
     */
    public function post($resourceName, $resourceData)
    {
        $response = $this->client->post($resourceName, $resourceData);

        return $response->getBody()->getContents();
    }
}
