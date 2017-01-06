<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\EventOccurrenceStaffGateway;
use OpenClassrooms\FrontDesk\Services\EventOccurrenceStaffService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EventOccurrenceStaffServiceImpl implements EventOccurrenceStaffService
{
    /**
     * @var EventOccurrenceStaffGateway
     */
    private $eventOccurrenceStaffGateway;

    /**
     * @inheritDoc
     */
    public function query(array $field = [], array $filter = [], $limit = 100)
    {
        return $this->eventOccurrenceStaffGateway->query($field, $filter, $limit);
    }

    public function setEventOccurrenceStaffGateway(EventOccurrenceStaffGateway $eventOccurrenceStaffGateway)
    {
        $this->eventOccurrenceStaffGateway = $eventOccurrenceStaffGateway;
    }
}
