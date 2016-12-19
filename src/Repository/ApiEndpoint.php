<?php

namespace OpenClassrooms\FrontDesk\Repository;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
final class ApiEndpoint
{
    const CORE_API_DESK = 'api/v2/desk';

    const CORE_API_FRONT = 'api/v2/front';

    const QUERY_NAME = '/queries';

    const REPORTING_API = 'desk/api/v3/reports';

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}
