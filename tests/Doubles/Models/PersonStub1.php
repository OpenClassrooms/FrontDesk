<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PersonImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonStub1 extends PersonImpl
{
    const ADDRESS = 'Person stub 1 address';

    const BIRTHDATE = '1990-09-27';

    const CUSTOM_FIELDS = [
        ['id' => 139386, 'value' => 'first custom field'],
        ['id' => 139387, 'value' => 'second custom field'],
    ];

    const EMAIL = 'personstub1email@openclassrooms.com';

    const FIRST_NAME = 'Person stub 1 first name';

    const GUARDIAN_EMAIL = 'guardianstubemail@openclassrooms.com';

    const GUARDIAN_NAME = 'guardianStubName';

    const ID = 3464028;

    const JOINED_AT = '2016-09-27 15:30:06';

    const LAST_NAME = 'Person stub 1 last name';

    const LOCATION_ID = 1241;

    const MIDDLE_NAME = 'Person stub middle name';

    const PHONE = 'Person stub 1 PHONE';

    const SEND_INVITE = false;

    const SKIP_COMPLIMENTARY_PASSES = false;

    protected $address = self::ADDRESS;

    protected $customFields = self::CUSTOM_FIELDS;

    protected $email = self::EMAIL;

    protected $firstName = self::FIRST_NAME;

    protected $guardianEmail = self::GUARDIAN_EMAIL;

    protected $guardianName = self::GUARDIAN_NAME;

    protected $id = self::ID;

    protected $lastName = self::LAST_NAME;

    protected $locationId = self::LOCATION_ID;

    protected $middleName = self::MIDDLE_NAME;

    protected $phone = self::PHONE;

    protected $sendInvite = self::SEND_INVITE;

    protected $skipComplimentaryPasses = self::SKIP_COMPLIMENTARY_PASSES;

    public function __construct()
    {
        $this->birthdate = new \DateTime(self::BIRTHDATE);
        $this->joinedAt = new \DateTime(self::JOINED_AT);
    }
}
