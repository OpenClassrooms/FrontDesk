<?php

namespace OpenClassrooms\FrontDesk\Client;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface ApiClient
{
    /**
     * @param string $resourceName
     * @param mixed  $resourceData
     *
     * @return string
     */
    public function post($resourceName, $resourceData);

    /**
     * @param string $resourceName
     *
     * @return string
     */
    public function get($resourceName);
}
