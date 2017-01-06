<?php

namespace OpenClassrooms\FrontDesk\Repository;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait ReportingQuery
{
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
