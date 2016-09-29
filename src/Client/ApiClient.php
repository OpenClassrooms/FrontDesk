<?php

namespace OpenClassrooms\FrontDesk\Client;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface ApiClient
{
    /**
     * @param string  $resource
     * @param array[] $params
     *
     * @return string
     */
    public function post($resource, $params);
}
