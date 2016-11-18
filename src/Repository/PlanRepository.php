<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\PlanGateway;
use OpenClassrooms\FrontDesk\Models\PlanBuilder;
use OpenClassrooms\FrontDesk\Services\Impl\InvalidTotalCountException;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanRepository extends BaseRepository implements PlanGateway
{
    const RESOURCE_NAME = ApiEndpoint::DESK.'/people/';

    /**
     * @var PlanBuilder
     */
    private $planBuilder;

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        $jsonResult = $this->apiClient->get(self::RESOURCE_NAME.$personId.'/plans');
        $result = json_decode($jsonResult, true);

        return $this->buildPlans($result);
    }

    /**
     * @param array $result
     *
     * @return array
     */
    private function buildPlans($result)
    {
        $plans = [];
        foreach ($result['plans'] as $plan) {
            $plans[] = $this->planBuilder
                ->create()
                ->withCanceledAt($plan['canceled_at'] !== null ? new \DateTime($plan['canceled_at']) : null)
                ->withConsiderMember($plan['consider_member'])
                ->withCount($plan['count'])
                ->withCreatedAt(new \DateTime($plan['created_at']))
                ->withDescription($plan['description'])
                ->withEndDate($plan['end_date'] !== null ? new \DateTime($plan['end_date']) : null)
                ->withId($plan['id'])
                ->withLocationId($plan['location_id'])
                ->withName($plan['name'])
                ->withPersonIds($plan['person_ids'])
                ->withPlanProductId($plan['plan_product_id'])
                ->withPriceCents($plan['price_cents'])
                ->withStaffMemberId($plan['staff_member_id'])
                ->withStartDate(new \DateTime($plan['start_date']))
                ->withType($plan['type'])
                ->withUpdateAt($plan['updated_at'] !== null ? new \DateTime($plan['updated_at']) : null)
                ->build();
        }

        if ($result['total_count'] !== count($plans)) {
            throw new InvalidTotalCountException();
        }

        return $plans;
    }

    public function setPlanBuilder(PlanBuilder $planBuilder)
    {
        $this->planBuilder = $planBuilder;
    }
}
