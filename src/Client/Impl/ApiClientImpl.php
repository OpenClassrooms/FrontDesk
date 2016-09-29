<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

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
    private $guzzle;

    /**
     * @param string $key    The API key
     * @param string $secret The front page or home URL
     */
    public function __construct($key, $token)
    {
        $this->guzzle = new \GuzzleHttp\Client(
            [
                'base_uri' => 'https://' . $key . '.frontdeskhq.com/api/v2/',
                'headers'  => ['Authorization' => "Bearer $token"]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function post($resource, $params)
    {
        $response = $this->guzzle->post(
            $resource,
            ['form_params' => $params]
        );

        return $response->getBody()->getContents();
    }
}
