<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\EnrollmentsGateway;
use OpenClassrooms\FrontDesk\Services\EnrollmentsService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentsServiceImpl implements EnrollmentsService
{
    /**
     * @var EnrollmentsGateway
     */
    private $enrollmentsGateway;

    /**
     * {@inheritdoc}
     */
    public function query(array $field = [], array $filter = [], $limit = 100)
    {
        return $this->enrollmentsGateway->query($field, $filter);
    }

    public function setEnrollmentsGateway(EnrollmentsGateway $enrollmentsGateway)
    {
        $this->enrollmentsGateway = $enrollmentsGateway;
    }
}
