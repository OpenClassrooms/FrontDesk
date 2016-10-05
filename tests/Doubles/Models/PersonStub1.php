<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PersonImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonStub1 extends PersonImpl
{
    const ADDRESS = 'Person stub 1 address';

    const EMAIL = 'personstub1email@openclassrooms.com';

    const FIRST_NAME = 'Person stub 1 first name';

    const ID = 1534;

    const JOINED_AT = '2016-09-27 15:30:06';

    const LAST_NAME = 'Person stub 1 last name';

    const PHONE = 'Person stub 1 PHONE';

    protected $address = self::ADDRESS;

    protected $email = self::EMAIL;

    protected $firstName = self::FIRST_NAME;

    protected $lastName = self::LAST_NAME;

    protected $phone = self::PHONE;

    public function __construct()
    {
        $this->joinedAt = new \DateTime(self::JOINED_AT);
    }
}
