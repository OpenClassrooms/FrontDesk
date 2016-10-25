<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

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
     * {@inheritdoc}
     */
    public function create()
    {
        $this->visit = new VisitImpl();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCancelledAt(\DateTime $cancelledAt = null)
    {
        $this->visit->setCancelledAt($cancelledAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCompletedAt(\DateTime $completedAt = null)
    {
        $this->visit->setCompletedAt($completedAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCreatedAt(\DateTime $createdAt = null)
    {
        $this->visit->setCreatedAt($createdAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withEventOccurrence($eventOccurrence)
    {
        $this->visit->setEventOccurrence($eventOccurrence);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withId($id)
    {
        $this->visit->setId($id);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withNoShowAt(\DateTime $noShowAt = null)
    {
        $this->visit->setNoShowAt($noShowAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPaid($paid)
    {
        $this->visit->setPaid($paid);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPaidForBy($paidForBy)
    {
        $this->visit->setPaidForBy($paidForBy);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withRegisterAt(\DateTime $registeredAt = null)
    {
        $this->visit->setRegisteredAt($registeredAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withStatus($status)
    {
        $this->visit->setStatus($status);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->visit;
    }
}
