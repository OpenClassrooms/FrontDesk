<?php

namespace OpenClassrooms\FrontDesk\Client;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface ApiClient
{
    /**
     * @param string $resourceName
     *
     * @return string
     */
    public function get($resourceName);

    /**
     * @param string $resourceName
     * @param object $resourceData
     *
     * @return string
     */
    public function post($resourceName, $resourceData);

    /**
     * @param $resourceName
     */
    public function delete($resourceName);
}
