<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Visit;
use OpenClassrooms\FrontDesk\Models\VisitBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitBuilderImpl implements VisitBuilder
{
    /**
     * @var VisitImpl
     */
    private $visit;

    /**
     * @return VisitBuilder
     */
    public function create()
    {
        $this->visit = new VisitImpl();

        return $this;
    }

    /**
     * @return VisitBuilder
     */
    public function withCancelledAt(\DateTime $cancelledAt = null)
    {
        $this->visit->setCancelledAt($cancelledAt);

        return $this;
    }

    /**
     * @return VisitBuilder
     */
    public function withCompletedAt(\DateTime $completedAt = null)
    {
        $this->visit->setCompletedAt($completedAt);

        return $this;
    }

    /**
     * @return VisitBuilder
     */
    public function withCreatedAt(\DateTime $createdAt)
    {
        $this->visit->setCreatedAt($createdAt);

        return $this;
    }

    /**
     * @param int $eventOccurrence
     *
     * @return VisitBuilder
     */
    public function withEventOccurrence($eventOccurrence)
    {
        $this->visit->setEventOccurrence($eventOccurrence);

        return $this;
    }

    /**
     * @param int $id
     *
     * @return VisitBuilder
     */
    public function withId($id)
    {
        $this->visit->setId($id);

        return $this;
    }

    /**
     * @return VisitBuilder
     */
    public function withNoShowAt(\DateTime $noShowAt)
    {
        $this->visit->setNoShowAt($noShowAt);

        return $this;
    }

    /**
     * @param boolean $paid
     *
     * @return VisitBuilder
     */
    public function withPaid($paid)
    {
        $this->visit->setPaid($paid);

        return $this;
    }

    /**
     * @param string $paidForBy
     *
     * @return VisitBuilder
     */
    public function withPaidForBy($paidForBy)
    {
        $this->visit->setPaidForBy($paidForBy);

        return $this;
    }

    /**
     * @return VisitBuilder
     */
    public function withRegisterAt(\DateTime $registeredAt = null)
    {
        $this->visit->setRegisteredAt($registeredAt);

        return $this;
    }

    /**
     * @param string $status
     *
     * @return VisitBuilder
     */
    public function withStatus($status)
    {
        $this->visit->setStatus($status);

        return $this;
    }

    /**
     * @return Visit
     */
    public function build()
    {
        return $this->visit;
    }
}
