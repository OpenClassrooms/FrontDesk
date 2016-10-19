<?php

namespace OpenClassrooms\FrontDesk\Doubles\Gateways;

use OpenClassrooms\FrontDesk\Gateways\PackGateway;
use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackGatewayMock implements PackGateway
{
    /**
     * @var int
     */
    public static $id = 0;

    /**
     * @var \OpenClassrooms\FrontDesk\Models\Pack[]
     */
    public static $packs = [];

    /**
     * @param Pack[] $packs
     */
    public function __construct(array $packs = [])
    {
        self::$id = 0;
        self::$packs = $packs;
    }

    /**
     * {@inheritdoc}
     */
    public function insert(Pack $pack, $packProductId)
    {
        self::$packs[++self::$id] = $pack;

        return self::$id;
    }

    /**
     * @param $packId
     */
    public function deleteById($packId)
    {
        unset(self::$packs[$packId]);
    }
}
