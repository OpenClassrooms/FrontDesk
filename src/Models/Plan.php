<?php

namespace OpenClassrooms\FrontDesk\Models;

use Carbon\Carbon;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class Plan
{
    /**
     * @var \DateTime
     */
    protected $canceledAt;

    /**
     * @var bool
     */
    protected $considerMember;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $locationId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int[]
     */
    protected $personIds;

    /**
     * @var int
     */
    protected $planProductId;

    /**
     * @var int
     */
    protected $priceCents;

    /**
     * @var int
     */
    protected $staffMemberId;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var \DateTime
     */
    protected $updateAt;

    public function isActive()
    {
        return null !== $this->getEndDate()
            && $this->getEndDate() > new \DateTime(Carbon::now()->toDateString())
            && $this->getStartDate() < new \DateTime(Carbon::now()->toDateString());
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    public function setCanceledAt(\DateTime $canceledAt = null)
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * @return bool
     */
    public function isConsiderMember()
    {
        return $this->considerMember;
    }

    /**
     * @param bool $considerMember
     */
    public function setConsiderMember($considerMember)
    {
        $this->considerMember = $considerMember;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int[]
     */
    public function getPersonIds()
    {
        return $this->personIds;
    }

    /**
     * @param int[] $personIds
     */
    public function setPersonIds(array $personIds)
    {
        $this->personIds = $personIds;
    }

    /**
     * @return int
     */
    public function getPlanProductId()
    {
        return $this->planProductId;
    }

    /**
     * @param int $planProductId
     */
    public function setPlanProductId($planProductId)
    {
        $this->planProductId = $planProductId;
    }

    /**
     * @return int
     */
    public function getPriceCents()
    {
        return $this->priceCents;
    }

    /**
     * @param int $priceCent
     */
    public function setPriceCents($priceCents)
    {
        $this->priceCents = $priceCents;
    }

    /**
     * @return int
     */
    public function getStaffMemberId()
    {
        return $this->staffMemberId;
    }

    /**
     * @param int $staffMemberId
     */
    public function setStaffMemberId($staffMemberId)
    {
        $this->staffMemberId = $staffMemberId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTime $updateAt = null)
    {
        $this->updateAt = $updateAt;
    }
}
