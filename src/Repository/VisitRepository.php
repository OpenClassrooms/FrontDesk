<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\VisitGateway;
use OpenClassrooms\FrontDesk\Models\Impl\VisitBuilderImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitRepository implements VisitGateway
{
    const RESOURCE_NAME = 'desk/people/';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId)
    {
        $visitBuilder = new VisitBuilderImpl();

        $jsonResult = $this->apiClient->get(self::RESOURCE_NAME.$personId.'/visits');
        $result = json_decode($jsonResult, true);

        $visits = $this->buildVisits($result, $visitBuilder);

        return $visits;
    }

    public function buildVisits($result, VisitBuilderImpl $visitBuilder)
    {
        $visits = [];

        foreach ($result as $visit) {
            $visits = $visitBuilder
                ->create()
                ->withCancelledAt($visit['cancelled_at'])
                ->withCompletedAt($visit['completed_at'])
                ->withCreatedAt($visit['created_at'])
                ->withEventOccurrence($visit['event_occurrence'])
                ->withId($visit['id'])
                ->withNoShowAt($visit['no_show_at'])
                ->withPaid($visit['paid'])
                ->withPaidForBy($visit['paid_for_by'])
                ->withRegisterAt($visit['register_at'])
                ->withStatus($visit['status'])
                ->build();
        }

        return $visits;
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
