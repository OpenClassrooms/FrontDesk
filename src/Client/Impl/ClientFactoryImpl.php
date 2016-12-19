<?php

namespace OpenClassrooms\FrontDesk\Client\Impl;

use OpenClassrooms\FrontDesk\Client\ClientFactory;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class ClientFactoryImpl implements ClientFactory
{
    /**
     * {@inheritdoc}
     */
    public function createCoreApi($key, $token)
    {
        return new CoreApiClientImpl($key, $token);
    }

    /**
     * {@inheritdoc}
     */
    public function createReportingApi($key, $token)
    {
        return new ReportingApiClientImpl($key, $token);
    }
}
