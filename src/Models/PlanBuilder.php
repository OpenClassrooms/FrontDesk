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
     * @param $canceledAt
     *
     * @return PlanBuilder
     */
    public function withCanceledAt(\DateTime $canceledAt = null);

    /**
     * @param $considerMember
     *
     * @return PlanBuilder
     */
    public function withConsiderMember($considerMember);

    /**
     * @param $count
     *
     * @return PlanBuilder
     */
    public function withCount($count);

    /**
     * @param $createdAt
     *
     * @return PlanBuilder
     */
    public function withCreatedAt(\DateTime $createdAt);

    /**
     * @param $description
     *
     * @return PlanBuilder
     */
    public function withDescription($description);

    /**
     * @param $endDate
     *
     * @return PlanBuilder
     */
    public function withEndDate(\DateTime $endDate = null);

    /**
     * @param $id
     *
     * @return PlanBuilder
     */
    public function withId($id);

    /**
     * @param $locationId
     *
     * @return PlanBuilder
     */
    public function withLocationId($locationId);

    /**
     * @param $name
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
     * @param $planProductId
     *
     * @return PlanBuilder
     */
    public function withPlanProductId($planProductId);

    /**
     * @param $priceCent
     *
     * @return PlanBuilder
     */
    public function withPriceCents($priceCent);

    /**
     * @param $staffMemberId
     *
     * @return PlanBuilder
     */
    public function withStaffMemberId($staffMemberId);

    /**
     * @param $startDate
     *
     * @return PlanBuilder
     */
    public function withStartDate(\DateTime $startDate);

    /**
     * @param $type
     *
     * @return PlanBuilder
     */
    public function withType($type);

    /**
     * @param $updateAt
     *
     * @return PlanBuilder
     */
    public function withUpdateAt(\DateTime $updateAt = null);

    /**
     * @return Plan
     */
    public function build();
}
