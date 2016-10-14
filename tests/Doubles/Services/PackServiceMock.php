<?php

namespace OpenClassrooms\FrontDesk\Doubles\Services;

use OpenClassrooms\FrontDesk\Models\Pack;
use OpenClassrooms\FrontDesk\Services\PackService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackServiceMock implements PackService
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
     * @return int
     */
    public function create(Pack $pack, $packProductId)
    {
        self::$packs[++self::$id] = $pack;

        return self::$id;
    }
}
