<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PersonImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonStub1 extends PersonImpl
{
    const ADDRESS = 'Person stub 1 address';

    const CUSTOM_FIELDS = [
        ['id' => 139386, 'value' => 'first custom field'],
        ['id' => 139387, 'value' => 'second custom field'],
    ];

    const EMAIL = 'personstub1email@openclassrooms.com';

    const FIRST_NAME = 'Person stub 1 first name';

    const ID = 3464028;

    const JOINED_AT = '2016-09-27 15:30:06';

    const LAST_NAME = 'Person stub 1 last name';

    const PHONE = 'Person stub 1 PHONE';

    public function __construct()
    {
        $this->address = self::ADDRESS;
        $this->customFields = self::CUSTOM_FIELDS;
        $this->email = self::EMAIL;
        $this->firstName = self::FIRST_NAME;
        $this->joinedAt = new \DateTime(self::JOINED_AT);
        $this->lastName = self::LAST_NAME;
        $this->phone = self::PHONE;
    }
}
