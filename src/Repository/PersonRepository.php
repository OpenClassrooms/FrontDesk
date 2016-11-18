<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Gateways\PersonGateway;
use OpenClassrooms\FrontDesk\Models\Impl\PersonBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Person;
use OpenClassrooms\FrontDesk\Models\PersonBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonRepository extends BaseRepository implements PersonGateway
{
    const RESOURCE_NAME = ApiEndpoint::DESK.'/people/';

    /**
     * @var PersonBuilder
     */
    private $personBuilder;

    public function __construct()
    {
        $this->personBuilder = new PersonBuilderImpl();
    }

    /**
     * {@inheritdoc}
     */
    public function getPeople($page = null)
    {
        $parameters = null;
        if (isset($page)) {
            $parameters = '?page='.$page;
        }

        $jsonResult = $this->apiClient->get(self::RESOURCE_NAME.$parameters);
        $result = json_decode($jsonResult, true);

        return $this->buildPeople($result);
    }

    /**
     * @param Person[] $result
     *
     * @return Person[]
     */
    private function buildPeople($result)
    {
        $people = [];

        foreach ($result['people'] as $person) {
            $people[] = $this->personBuilder
                ->create()
                ->withAddress($person['address'])
                ->withBirthdate($person['birthdate'] !== null ? new \DateTime($person['birthdate']) : null)
                ->withCustomFields($person['custom_fields'])
                ->withEmail($person['email'])
                ->withFirstName($person['first_name'])
                ->withGuardianEmail($person['guardian_email'])
                ->withGuardianName($person['guardian_name'])
                ->withJoinedAt($person['joined_at'] !== null ? new \DateTime($person['joined_at']) : null)
                ->withLastName($person['last_name'])
                ->withLocationId($person['location_id'])
                ->withMiddleName($person['middle_name'])
                ->withPhone($person['phone'])
                ->build();
        }

        return $people;
    }

    /**
     * {@inheritdoc}
     */
    public function insert(Person $person)
    {
        $jsonResult = $this->apiClient->post(self::RESOURCE_NAME, ['person' => $person]);
        $result = json_decode($jsonResult, true);

        return $result['people'][0]['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person)
    {
        $jsonResult = $this->apiClient->put(self::RESOURCE_NAME.$person->getId(), ['person' => $person]);
        $result = json_decode($jsonResult, true);

        return $result['people'][0]['id'];
    }
}
