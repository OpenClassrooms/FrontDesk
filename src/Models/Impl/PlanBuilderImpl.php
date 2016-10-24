<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\PlanBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanBuilderImpl implements PlanBuilder
{
    /**
     * @var PlanImpl
     */
    private $plan;

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->plan = new PlanImpl();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCanceledAt(\DateTime $canceledAt = null)
    {
        $this->plan->setCanceledAt($canceledAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withConsiderMember($considerMember)
    {
        $this->plan->setConsiderMember($considerMember);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCount($count)
    {
        $this->plan->setCount($count);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCreatedAt(\DateTime $createdAt = null)
    {
        $this->plan->setCreatedAt($createdAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withDescription($description)
    {
        $this->plan->setDescription($description);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withEndDate(\DateTime $endDate = null)
    {
        $this->plan->setEndDate($endDate);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withId($id)
    {
        $this->plan->setId($id);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withLocationId($locationId)
    {
        $this->plan->setLocationId($locationId);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withName($name)
    {
        $this->plan->setName($name);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPersonIds(array $personIds = null)
    {
        $this->plan->setPersonIds($personIds);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPlanProductId($planProductId)
    {
        $this->plan->setPlanProductId($planProductId);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPriceCents($priceCents)
    {
        $this->plan->setPriceCents($priceCents);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withStaffMemberId($staffMemberId)
    {
        $this->plan->setStaffMemberId($staffMemberId);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withStartDate(\DateTime $startDate = null)
    {
        $this->plan->setStartDate($startDate);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withType($type)
    {
        $this->plan->setType($type);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withUpdateAt(\DateTime $updateAt = null)
    {
        $this->plan->setUpdateAt($updateAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->plan;
    }
}
