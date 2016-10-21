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
    private $planGateway;

    /**
     * {@inheritdoc}
     */
    public function getPlans($personId)
    {
        return $this->planGateway->findAllByPersonId($personId);
    }

    public function setPlanGateway(PlanGateway $planGateway)
    {
        $this->planGateway = $planGateway;
    }
}
