<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\PackGateway;
use OpenClassrooms\FrontDesk\Models\Pack;
use OpenClassrooms\FrontDesk\Services\PackService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackServiceImpl implements PackService
{
    /**
     * @var PackGateway
     */
    private $packGateway;

    /**
     * {@inheritdoc}
     */
    public function create(Pack $pack, $packProductId)
    {
        return $this->packGateway->insert($pack, $packProductId);
    }

    public function setGateway(PackGateway $packGateway)
    {
        $this->packGateway = $packGateway;
    }
}
