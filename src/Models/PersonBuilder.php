<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonBuilder
{
    /**
     * @return PersonBuilder
     */
    public function create();

    /**
     * @param string $address
     *
     * @return PersonBuilder
     */
    public function withAddress($address);

    /**
     * @param array|null $customFields
     *
     * @return PersonBuilder
     */
    public function withCustomFields(array $customFields);

    /**
     * @param string $email
     *
     * @return PersonBuilder
     */
    public function withEmail($email);

    /**
     * @param string $firstName
     *
     * @return PersonBuilder
     */
    public function withFirstName($firstName);

    /**
     * @return PersonBuilder
     */
    public function withJoinedAt(\DateTime $joinedAt = null);

    /**
     * @param string $lastName
     *
     * @return PersonBuilder
     */
    public function withLastName($lastName);

    /**
     * @param string $phone
     *
     * @return PersonBuilder
     */
    public function withPhone($phone);

    /**
     * @return Person
     */
    public function build();
}
