<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PlanBuilder
{
    /**
     * @return PlanBuilder
     */
    public function create();

    /**
     * @return PlanBuilder
     */
    public function withCanceledAt(\DateTime $canceledAt = null);

    /**
     * @param boolean $considerMember
     *
     * @return PlanBuilder
     */
    public function withConsiderMember($considerMember);

    /**
     * @param int $count
     *
     * @return PlanBuilder
     */
    public function withCount($count);

    /**
     * @return PlanBuilder
     */
    public function withCreatedAt(\DateTime $createdAt = null);

    /**
     * @param string $description
     *
     * @return PlanBuilder
     */
    public function withDescription($description);

    /**
     * @return PlanBuilder
     */
    public function withEndDate(\DateTime $endDate = null);

    /**
     * @param int $id
     *
     * @return PlanBuilder
     */
    public function withId($id);

    /**
     * @param int $locationId
     *
     * @return PlanBuilder
     */
    public function withLocationId($locationId);

    /**
     * @param string $name
     *
     * @return PlanBuilder
     */
    public function withName($name);

    /**
     * @param int[] $personIds
     *
     * @return PlanBuilder
     */
    public function withPersonIds(array $personIds = null);

    /**
     * @param int $planProductId
     *
     * @return PlanBuilder
     */
    public function withPlanProductId($planProductId);

    /**
     * @param int $priceCent
     *
     * @return PlanBuilder
     */
    public function withPriceCents($priceCent);

    /**
     * @param int $staffMemberId
     *
     * @return PlanBuilder
     */
    public function withStaffMemberId($staffMemberId);

    /**
     * @return PlanBuilder
     */
    public function withStartDate(\DateTime $startDate = null);

    /**
     * @param string $type
     *
     * @return PlanBuilder
     */
    public function withType($type);

    /**
     * @return PlanBuilder
     */
    public function withUpdateAt(\DateTime $updateAt = null);

    /**
     * @return Plan
     */
    public function build();
}
