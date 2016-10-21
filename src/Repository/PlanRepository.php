<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\PlanGateway;
use OpenClassrooms\FrontDesk\Models\Impl\PlanBuilderImpl;
use OpenClassrooms\FrontDesk\Services\Impl\InvalidTotalCountException;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanRepository implements PlanGateway
{
    const RESOURCE_NAME = 'desk/people';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        $planBuilder = new PlanBuilderImpl();

        $jsonResult = $this->apiClient->get(self::RESOURCE_NAME.'/'.$personId.'/plans');
        $result = json_decode($jsonResult, true);

        $plans = $this->buildPlans($result, $planBuilder);

        return $plans;
    }

    /**
     * @param array $result
     *
     * @return array
     */
    private function buildPlans($result, PlanBuilderImpl $planBuilder)
    {
        $plans = [];
        foreach ($result['plans'] as $plan) {

            $plans[] = $planBuilder
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

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
