<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\EnrollmentGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentRepository extends BaseRepository implements EnrollmentGateway
{
    use ReportingQuery;

    const RESOURCE_NAME = '/enrollments'.ApiEndpoint::QUERY_NAME;

    /**
     * {@inheritdoc}
     */
    public function query(array $fields = [], array $filter = [], $limit = 100)
    {
        $hasMorePage = true;
        $lastKey = null;
        $resultPage = [];

        while ($hasMorePage) {
            $enrollmentQueryJson = $this->getQuery($fields, $filter, $limit, $lastKey);

            $jsonResult = $this->reportingApiClient->post(
                ApiEndpoint::REPORTING_API.self::RESOURCE_NAME,
                ['body' => $enrollmentQueryJson]
            );

            $result = json_decode($jsonResult, true);

            $resultPage[] = $result['data']['attributes']['rows'];
            $hasMorePage = $result['data']['attributes']['has_more'];
            $lastKey = $result['data']['attributes']['last_key'];
        }

        return $this->finalResultPages($fields, $resultPage);
    }
}
