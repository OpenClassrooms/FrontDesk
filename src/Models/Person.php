<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class Person
{
    /**
     * @var string
     */
    protected $address;

    /**
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * @var array
     */
    protected $customFields;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $guardianEmail;

    /**
     * @var string
     */
    protected $guardianName;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \DateTime
     */
    protected $joinedAt;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var int
     */
    protected $locationId;

    /**
     * @var string
     */
    protected $middleName;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var bool
     */
    protected $sendInvite;

    /**
     * @var bool
     */
    protected $skipComplimentaryPasses;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTime $birthdate = null)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getGuardianEmail()
    {
        return $this->guardianEmail;
    }

    /**
     * @param string $guardianEmail
     */
    public function setGuardianEmail($guardianEmail)
    {
        $this->guardianEmail = $guardianEmail;
    }

    /**
     * @return string
     */
    public function getGuardianName()
    {
        return $this->guardianName;
    }

    /**
     * @param string $guardianName
     */
    public function setGuardianName($guardianName)
    {
        $this->guardianName = $guardianName;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return bool
     */
    public function isSendInvite()
    {
        return $this->sendInvite;
    }

    /**
     * @param bool $sendInvite
     */
    public function setSendInvite($sendInvite)
    {
        $this->sendInvite = $sendInvite;
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     */
    public function setCustomFields(array $customFields)
    {
        $this->customFields = $customFields;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getJoinedAt()
    {
        return $this->joinedAt;
    }

    public function setJoinedAt(\DateTime $joinedAt = null)
    {
        $this->joinedAt = $joinedAt;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return bool
     */
    public function isSkipComplimentaryPasses()
    {
        return $this->skipComplimentaryPasses;
    }

    /**
     * @param bool $skipComplimentaryPasses
     */
    public function setSkipComplimentaryPasses($skipComplimentaryPasses)
    {
        $this->skipComplimentaryPasses = $skipComplimentaryPasses;
    }
}
