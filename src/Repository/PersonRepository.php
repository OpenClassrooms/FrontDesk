<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\PersonGateway;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonRepository extends BaseRepository implements PersonGateway
{
    const RESOURCE_NAME = ApiEndpoint::DESK.'/people/';

    /**
     * {@inheritdoc}
     */
    public function insert(Person $person)
    {
        $jsonResult = $this->apiClient->post(self::RESOURCE_NAME, $person);
        $result = json_decode($jsonResult, true);

        return $result['people'][0]['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person, $personId)
    {
        $jsonResult = $this->apiClient->put(self::RESOURCE_NAME.$personId, $person);
        $result = json_decode($jsonResult, true);

        return $result['people'][0]['id'];
    }
}
