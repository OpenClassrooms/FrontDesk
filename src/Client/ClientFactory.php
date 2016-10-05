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
     * @return ApiClient
     */
    public function create($key, $token);
}
