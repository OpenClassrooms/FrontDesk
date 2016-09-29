<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\PackGateway;
use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackRepository implements PackGateway
{
    const RESOURCE_NAME = 'pack';

    /**
     * @var ApiClient $apiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function insert(Pack $pack)
    {
        return $this->apiClient->post(self::RESOURCE_NAME, $pack->toArray());
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
