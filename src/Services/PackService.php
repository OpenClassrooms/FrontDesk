<?php

namespace OpenClassrooms\FrontDesk\Services;

use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PackService
{
    /**
     * @param int $packProductId
     *
     * @return int
     */
    public function create(Pack $pack, $packProductId);

    /**
     * @param int $packId
     */
    public function deletePack($packId);
}
