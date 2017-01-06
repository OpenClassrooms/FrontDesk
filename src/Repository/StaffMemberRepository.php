<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\StaffMemberGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class StaffMemberRepository extends BaseRepository implements StaffMemberGateway
{
    const RESOURCE_NAME = '/staff_members'.ApiEndpoint::QUERY_NAME;

    /**
     * {@inheritdoc}
     */
    public function query(array $fields = [], array $filter = [], $limit = 100)
    {
        $hasMorePage = true;
        $lastKey = null;
        $resultPage = [];

        while ($hasMorePage) {
            $staffMemberQueryJson = $this->getQuery($fields, $filter, $limit, $lastKey);

            $jsonResult = $this->reportingApiClient->post(
                ApiEndpoint::REPORTING_API.self::RESOURCE_NAME,
                ['body' => $staffMemberQueryJson]
            );

            $result = json_decode($jsonResult, true);

            $resultPage[] = $result['data']['attributes']['rows'];
            $hasMorePage = $result['data']['attributes']['has_more'];
            $lastKey = $result['data']['attributes']['last_key'];
        }

        return $this->finalResultPages($fields, $resultPage);
    }

    private function getQuery(array $fields = [], array $filter = [], $limit = 100, $lastKey = null)
    {
        $query = [
            'data' => [
                'type'       => 'queries',
                'attributes' => [
                    'fields' => $fields,
                    'sort'   => [],
                    'page'   => [
                        'limit'          => $limit,
                        'starting_after' => null !== $lastKey ? $lastKey : null,
                    ],
                    'filter' => $filter,
                ],
            ],
        ];

        return json_encode($query);
    }

    /**
     * @param array $fields
     * @param array $resultPage
     *
     * @return array
     */
    private function finalResultPages(array $fields, array $resultPage)
    {
        return array_map(
            function ($resultRows) use ($fields) {
                return $this->getRows($resultRows, $fields);
            },
            $resultPage
        );
    }

    /**
     * @param array $resultRows
     * @param array $fields
     *
     * @return array
     */
    private function getRows(array $resultRows, array $fields)
    {
        return array_map(
            function ($row) use ($fields) {
                return array_combine($fields, $row);
            },
            $resultRows
        );
    }
}
