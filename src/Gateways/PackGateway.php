<?php

namespace OpenClassrooms\FrontDesk\Gateways;

use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PackGateway
{
    /**
     * @param int $packProductId
     *
     * @return int
     */
    public function insert(Pack $pack, $packProductId);

    /**
     * @param int $packId
     */
    public function deleteById($packId);
}
