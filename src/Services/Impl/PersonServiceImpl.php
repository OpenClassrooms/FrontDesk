<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Gateways\PersonGateway;
use OpenClassrooms\FrontDesk\Models\Person;
use OpenClassrooms\FrontDesk\Services\PersonService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonServiceImpl implements PersonService
{
    /**
     * @var PersonGateway
     */
    private $personGateway;

    /**
     * {@inheritdoc}
     */
    public function create(Person $person)
    {
        return $this->personGateway->insert($person);
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person, $personId)
    {
        return $this->personGateway->update($person, $personId);
    }

    public function setPersonGateway(PersonGateway $personGateway)
    {
        $this->personGateway = $personGateway;
    }
}
