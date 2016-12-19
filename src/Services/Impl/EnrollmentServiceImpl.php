<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\EnrollmentGateway;
use OpenClassrooms\FrontDesk\Services\EnrollmentService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentServiceImpl implements EnrollmentService
{
    /**
     * @var EnrollmentGateway
     */
    private $enrollmentGateway;

    /**
     * {@inheritdoc}
     */
    public function query(array $field = [], array $filter = [], $limit = 100)
    {
        return $this->enrollmentGateway->query($field, $filter);
    }

    public function setEnrollmentGateway(EnrollmentGateway $enrollmentGateway)
    {
        $this->enrollmentGateway = $enrollmentGateway;
    }
}
