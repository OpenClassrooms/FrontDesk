<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\VisitGateway;
use OpenClassrooms\FrontDesk\Models\Impl\VisitBuilderImpl;
use OpenClassrooms\FrontDesk\Models\VisitBuilder;
use OpenClassrooms\FrontDesk\Services\Impl\InvalidTotalCountException;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitRepository implements VisitGateway
{
    const RESOURCE_NAME = ApiEndpoint::DESK.'/visits/';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var VisitBuilder
     */
    private $visitBuilder;

    public function __construct()
    {
        $this->visitBuilder = new VisitBuilderImpl();
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId, $from = null, $to = null)
    {
        $parameters = null;
        if (isset($from, $to)) {
            $parameters = '?from='.$from.'&to='.$to;
        }

        $jsonResult = $this->apiClient->get(PersonRepository::RESOURCE_NAME.$personId.'/visits'.$parameters);
        $result = json_decode($jsonResult, true);

        return $this->buildVisits($result);
    }

    public function buildVisits($result)
    {
        $visits = [];
        foreach ($result['visits'] as $visit) {
            $visits[] = $this->visitBuilder
                ->create()
                ->withCancelledAt($visit['cancelled_at'] !== null ? new \DateTime($visit['cancelled_at']) : null)
                ->withCompletedAt($visit['completed_at'] !== null ? new \DateTime($visit['completed_at']) : null)
                ->withCreatedAt($visit['created_at'] !== null ? new \DateTime($visit['created_at']) : null)
                ->withEventOccurrence($visit['event_occurrence'])
                ->withId($visit['id'])
                ->withNoShowAt($visit['noshow_at'] !== null ? new \DateTime($visit['noshow_at']) : null)
                ->withPaid($visit['paid'])
                ->withPaidForBy($visit['paid_for_by'])
                ->withRegisterAt($visit['registered_at'] !== null ? new \DateTime($visit['registered_at']) : null)
                ->withStatus($visit['status'])
                ->build();
        }

        if ($result['total_count'] !== count($visits)) {
            throw new InvalidTotalCountException();
        }

        return $visits;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($visitId, $personNotification = false)
    {
        $this->apiClient->delete(self::RESOURCE_NAME.$visitId.'?notify_client='.(string) $personNotification);
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
