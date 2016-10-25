<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class Visit
{
    /**
     * @var \DateTime
     */
    protected $cancelledAt;

    /**
     * @var \DateTime
     */
    protected $completedAt;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $eventOccurrence;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \DateTime
     */
    protected $noShowAt;

    /**
     * @var boolean
     */
    protected $paid;

    /**
     * @var string
     */
    protected $paidForBy;

    /**
     * @var \DateTime
     */
    protected $registeredAt;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return \DateTime
     */
    public function getCancelledAt()
    {
        return $this->cancelledAt;
    }

    public function setCancelledAt(\DateTime $cancelledAt = null)
    {
        $this->cancelledAt = $cancelledAt;
    }

    /**
     * @return \DateTime
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    public function setCompletedAt(\DateTime $completedAt = null)
    {
        $this->completedAt = $completedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getEventOccurrence()
    {
        return $this->eventOccurrence;
    }

    /**
     * @param int $eventOccurrence
     */
    public function setEventOccurrence($eventOccurrence)
    {
        $this->eventOccurrence = $eventOccurrence;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getNoShowAt()
    {
        return $this->noShowAt;
    }

    public function setNoShowAt(\DateTime $noShowAt = null)
    {
        $this->noShowAt = $noShowAt;
    }

    /**
     * @return boolean
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param boolean $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * @return string
     */
    public function getPaidForBy()
    {
        return $this->paidForBy;
    }

    /**
     * @param string $paidForBy
     */
    public function setPaidForBy($paidForBy)
    {
        $this->paidForBy = $paidForBy;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(\DateTime $registeredAt = null)
    {
        $this->registeredAt = $registeredAt;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
