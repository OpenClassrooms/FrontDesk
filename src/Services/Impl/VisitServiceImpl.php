<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\VisitGateway;
use OpenClassrooms\FrontDesk\Services\VisitService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitServiceImpl implements VisitService
{
    /**
     * @var VisitGateway
     */
    private $visitGateway;

    /**
     * {@inheritdoc}
     */
    public function getVisits($personId)
    {
        return $this->visitGateway->findAllByPersonId($personId);
    }

    public function setPlanGateway(VisitGateway $visitGateway)
    {
        $this->visitGateway = $visitGateway;
    }
}
