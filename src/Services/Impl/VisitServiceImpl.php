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
    public function getVisits($personId, $from = null, $to = null)
    {
        return $this->visitGateway->findAllByPersonId($personId, $from, $to);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteVisit($visitId)
    {
        return $this->visitGateway->deleteById($visitId);
    }

    public function setVisitGateway(VisitGateway $visitGateway)
    {
        $this->visitGateway = $visitGateway;
    }
}
