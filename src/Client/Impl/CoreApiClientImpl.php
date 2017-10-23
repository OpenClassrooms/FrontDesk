<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OpenClassrooms\FrontDesk\Client\CoreApiClient;
use OpenClassrooms\FrontDesk\Client\NotFoundException;
use OpenClassrooms\FrontDesk\Client\UnprocessableEntityException;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class CoreApiClientImpl implements CoreApiClient
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
                'headers'  => ['Authorization' => "Bearer $token"],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function get($resourceName)
    {
        $client = new Client(
            [
                'base_uri' => 'https://openclassrooms.frontdeskhq.com/',
                'headers'  => ['Authorization' => "Bearer $token"],
            ]);

        $response = $client->get($resourceName);

        return $response->getBody()->getContents();
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
    public function put($resourceName, $resourceData)
    {
        $response = $this->client->put($resourceName, ['json' => $resourceData]);

        return $response->getBody()->getContents();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($resourceName)
    {
        $response = $this->client->delete($resourceName);

        if ($response->getStatusCode() === 422) {
            throw new UnprocessableEntityException();
        } elseif ($response->getStatusCode() === 404) {
            throw new NotFoundException();
        }
    }
}
