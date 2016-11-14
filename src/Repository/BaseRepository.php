<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class BaseRepository
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
