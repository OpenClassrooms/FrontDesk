<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\VisitGateway;
use OpenClassrooms\FrontDesk\Models\VisitBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitRepository extends BaseRepository implements VisitGateway
{
    const RESOURCE_NAME = ApiEndpoint::CORE_API_DESK.'/visits/';

    /**
     * @var VisitBuilder
     */
    private $visitBuilder;

    /**
     * {@inheritdoc}
     */
    public function findAllByPersonId($personId, $from = null, $to = null)
    {
        if ($from instanceof \DateTime) {
            $from = $from->format(DATE_ISO8601);
        }

        if ($to instanceof \DateTime) {
            $to = $to->format(DATE_ISO8601);
        }

        $parameters = ['from' => $from, 'to' => $to];
        $jsonResult = $this->coreApiClient->get(
            PersonRepository::RESOURCE_NAME.$personId.'/visits'.urldecode('?'.http_build_query($parameters))
        );
        $result = json_decode($jsonResult, true);

        return $this->buildVisits($result);
    }

    private function buildVisits($result)
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

        return $visits;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($visitId, $personNotification = false)
    {
        $this->coreApiClient->delete(self::RESOURCE_NAME.$visitId.'?notify_client='.(string) $personNotification);
    }

    public function setVisitBuilder(VisitBuilder $visitBuilder)
    {
        $this->visitBuilder = $visitBuilder;
    }
}
