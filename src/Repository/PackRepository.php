<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\PackGateway;
use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackRepository extends BaseRepository implements PackGateway
{
    const RESOURCE_PACK_PRODUCT_NAME = ApiEndpoint::CORE_API_DESK.'/pack_products/';

    const RESOURCE_PACK_NAME = ApiEndpoint::CORE_API_DESK.'/packs/';

    /**
     * {@inheritdoc}
     */
    public function insert(Pack $pack, $packProductId)
    {
        $jsonResult = $this->coreApiClient->post(self::RESOURCE_PACK_PRODUCT_NAME.$packProductId.'/packs', $pack);
        $result = json_decode($jsonResult, true);

        return $result['packs'][0]['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($packId)
    {
        $this->coreApiClient->delete(self::RESOURCE_PACK_NAME.$packId);
    }
}
