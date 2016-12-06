<?php

namespace OpenClassrooms\FrontDesk\Client;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface ClientFactory
{
    /**
     * @param string $key
     * @param string $token
     *
     * @return CoreApiClient
     */
    public function createCoreApi($key, $token);

    /**
     * @param string $key
     * @param string $token
     *
     * @return ReportingApiClient
     */
    public function createReportingApi($key, $token);
}
