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
    const RESOURCE_NAME = ApiEndpoint::DESK.'/pack_products/';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function insert(Pack $pack, $packProductId)
    {
        $jsonResult = $this->apiClient->post(self::RESOURCE_NAME.$packProductId.'/packs', $pack);
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
