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
    public function findAll($page = null)
    {
        return $this->personGateway->findAll($page);
    }

    /**
     * {@inheritdoc}
     */
    public function update(Person $person)
    {
        return $this->personGateway->update($person);
    }

    public function setPersonGateway(PersonGateway $personGateway)
    {
        $this->personGateway = $personGateway;
    }
}
