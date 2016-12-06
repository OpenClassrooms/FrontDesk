<?php

namespace OpenClassrooms\FrontDesk\Services;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface EnrollmentsService
{
    /**
     * @param array $field
     * @param array $filter
     * @param int   $limit
     *
     * @return array
     */
    public function query(array $field = [], array $filter = [], $limit = 100);
}
