<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface VisitBuilder
{
    /**
     * @return VisitBuilder
     */
    public function create();

    /**
     * @return VisitBuilder
     */
    public function withCancelledAt(\DateTime $cancelledAt = null);

    /**
     * @return VisitBuilder
     */
    public function withCompletedAt(\DateTime $completedAt = null);

    /**
     * @return VisitBuilder
     */
    public function withCreatedAt(\DateTime $createdAt = null);

    /**
     * @param int $eventOccurrence
     *
     * @return VisitBuilder
     */
    public function withEventOccurrence($eventOccurrence);

    /**
     * @param int $id
     *
     * @return VisitBuilder
     */
    public function withId($id);

    /**
     * @return VisitBuilder
     */
    public function withNoShowAt(\DateTime $noShowAt = null);

    /**
     * @param boolean $paid
     *
     * @return VisitBuilder
     */
    public function withPaid($paid);

    /**
     * @param string $paidForBy
     *
     * @return VisitBuilder
     */
    public function withPaidForBy($paidForBy);

    /**
     * @return VisitBuilder
     */
    public function withRegisterAt(\DateTime $registeredAt = null);

    /**
     * @param string $status
     *
     * @return VisitBuilder
     */
    public function withStatus($status);

    /**
     * @return Visit
     */
    public function build();
}
