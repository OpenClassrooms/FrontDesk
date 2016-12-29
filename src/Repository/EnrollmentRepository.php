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
        $hasMorePage = true;
        $lastKey = null;
        $resultPage = [];

        while (true === $hasMorePage) {
            $enrollmentQuery = $this->getQuery($fields, $filter, $limit, $lastKey);
            $enrollmentQueryJson = json_encode($enrollmentQuery);

            $jsonResult = $this->reportingApiClient->post(
                ApiEndpoint::REPORTING_API.self::RESOURCE_NAME,
                ['body' => $enrollmentQueryJson]
            );

            $result = json_decode($jsonResult, true);

            $resultPage[] = $result['data']['attributes']['rows'];
            $hasMorePage = $result['data']['attributes']['has_more'];
            $lastKey = $result['data']['attributes']['last_key'];
        }

        $finalResult = [];
        foreach ($resultPage as $resultRows) {
            foreach ($resultRows as $row) {
                $finalResult[] = array_combine($fields, $row);
            }
        }

        return $finalResult;
    }

    protected function getQuery(array $fields = [], array $filter = [], $limit = 100, $lastKey = null)
    {
        return [
            'data' => [
                'type'       => 'queries',
                'attributes' => [
                    'fields' => $fields,
                    'sort'   => [],
                    'page'   => [
                        'limit'          => $limit,
                        'starting_after' => null !== $lastKey ? $lastKey : null
                    ],
                    'filter' => $filter,
                ],
            ],
        ];
    }
}
