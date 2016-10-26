<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\PersonBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonBuilderImpl implements PersonBuilder
{
    /**
     * @var PersonImpl
     */
    private $person;

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->person = new PersonImpl();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withAddress($address)
    {
        $this->person->setAddress($address);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCustomFields(array $customFields = [])
    {
        $this->person->setCustomFields($customFields);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withEmail($email)
    {
        $this->person->setEmail($email);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFirstName($firstName)
    {
        $this->person->setFirstName($firstName);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withJoinedAt(\DateTime $joinedAt = null)
    {
        $this->person->setJoinedAt($joinedAt);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withLastName($lastName)
    {
        $this->person->setLastName($lastName);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPhone($phone)
    {
        $this->person->setPhone($phone);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->person;
    }
}
