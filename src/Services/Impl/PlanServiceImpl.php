<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\PlanGateway;
use OpenClassrooms\FrontDesk\Services\PlanService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanServiceImpl implements PlanService
{
    /**
     * @var PlanGateway
     */
    private $personGateway;

    /**
     * {@inheritdoc}
     */
    public function pickUp($personId)
    {
        return $this->personGateway->recuperate($personId);
    }

    public function setPlanGateway(PlanGateway $personGateway)
    {
        $this->personGateway = $personGateway;
    }
}
