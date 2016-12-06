<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\CoreApiClient;
use OpenClassrooms\FrontDesk\Client\ReportingApiClient;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class BaseRepository
{
    /**
     * @var CoreApiClient
     */
    protected $coreApiClient;

    /**
     * @var ReportingApiClient
     */
    protected $reportingApiClient;

    public function setCoreApiClient(CoreApiClient $apiClient)
    {
        $this->coreApiClient = $apiClient;
    }

    public function setReportingApiClient(ReportingApiClient $reportingApiClient)
    {
        $this->reportingApiClient = $reportingApiClient;
    }
}
