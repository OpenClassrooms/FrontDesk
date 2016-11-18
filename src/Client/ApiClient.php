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
     *
     * @throws NotFoundException
     */
    public function get($resourceName);

    /**
     * @param string $resourceName
     * @param mixed  $resourceData
     *
     * @return string
     */
    public function post($resourceName, $resourceData);

    /**
     * @param string $resourceName
     * @param mixed  $resourceData
     *
     * @return string
     */
    public function put($resourceName, $resourceData);

    /**
     * @param string $resourceName
     */
    public function delete($resourceName);
}
