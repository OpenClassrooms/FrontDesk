<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Client\ApiClient;
use OpenClassrooms\FrontDesk\Gateways\PersonGateway;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonRepository implements PersonGateway
{
    const RESOURCE_NAME = 'desk/people';

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * {@inheritdoc}
     */
    public function insert(Person $person)
    {
        return $this->apiClient->post(self::RESOURCE_NAME, $person);
    }

    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
