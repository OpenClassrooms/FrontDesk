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
    public function create($key, $token)
    {
        return new ApiClientImpl($key, $token);
    }
}
