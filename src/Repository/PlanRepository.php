<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\PlanGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanRepository implements PlanGateway
{
    const RESOURCE_NAME = 'desk/people';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function recuperate($personId)
    {
        $jsonResult = $this->apiClient->get(self::RESOURCE_NAME.'/'.$personId.'/plans');
        $result = json_decode($jsonResult, true);

        return $result;
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
