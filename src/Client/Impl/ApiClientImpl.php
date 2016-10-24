<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OpenClassrooms\FrontDesk\Client\ApiClient;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ApiClientImpl implements ApiClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param string $key    The API key
     * @param string $secret The front page or home URL
     */
    public function __construct($key, $token)
    {
        $this->client = new Client(
            [
                'base_uri' => 'https://'.$key.'.frontdeskhq.com/api/v2/',
                'headers'  => ['Authorization' => "Bearer $token"],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function post($resourceName, $resourceData)
    {
        $response = $this->client->post($resourceName, ['json' => $resourceData]);

        return $response->getBody()->getContents();
    }

    /**
     * {@inheritdoc}
     */
    public function get($resourceName)
    {
        $response = $this->client->get($resourceName);

        return $response->getBody()->getContents();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($resourceName)
    {
        $this->client->delete($resourceName);
    }
}
