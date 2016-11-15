<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Client\NotFoundException;
use OpenClassrooms\FrontDesk\Client\UnprocessableEntityException;

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
     * @param string $key
     * @param string $token
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
    public function get($resourceName)
    {
        $response = $this->client->get($resourceName);

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
