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
    const RESOURCE_NAME = 'packs';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function insert(Pack $pack, $packProductId)
    {
        $jsonResult = $this->apiClient->post("desk/pack_products/{$packProductId}/".self::RESOURCE_NAME, $pack);
        $result = json_decode($jsonResult, true);

        return $result['packs'][0]['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($packId)
    {
        $this->apiClient->delete('desk/'.self::RESOURCE_NAME.'/'.$packId);
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
