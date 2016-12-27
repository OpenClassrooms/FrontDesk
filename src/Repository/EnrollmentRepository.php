<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\EnrollmentGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class EnrollmentRepository extends BaseRepository implements EnrollmentGateway
{
    const RESOURCE_NAME = '/enrollments'.ApiEndpoint::QUERY_NAME;

    /**
     * {@inheritdoc}
     */
    public function query(array $fields = [], array $filter = [], $limit = 100)
    {
        $enrollmentQuery = $this->getQuery($fields, $filter);
        $enrollmentQueryJson = json_encode($enrollmentQuery);

        $jsonResult = $this->reportingApiClient->post(
            ApiEndpoint::REPORTING_API.self::RESOURCE_NAME,
            ['body' => $enrollmentQueryJson]
        );

        $result = json_decode($jsonResult, true);
        $resultRows = $result['data']['attributes']['rows'];

        $finalResult = [];
        foreach ($resultRows as $row) {
            $finalResult[] = array_combine($fields, $row);
        }

        return $finalResult;
    }

    protected function getQuery(array $fields = [], array $filter = [], $limit = 100)
    {
        return [
            'data' => [
                'type'       => 'queries',
                'attributes' => [
                    'fields' => $fields,
                    'sort'   => [],
                    'page'   => ['limit' => $limit],
                    'filter' => $filter,
                ],
            ],
        ];
    }
}
