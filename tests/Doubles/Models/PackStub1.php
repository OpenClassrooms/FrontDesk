<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PackImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackStub1 extends PackImpl
{
    const COUNT = '999';

    const END_DATE = '2016-10-04 09:34:00';

    const ID = 1;

    const PERSON_IDS = ['Pack Stub 1 person ids'];

    const START_DATE = '2016-09-30 11:30:00';


    protected $count = self::COUNT;

    protected $id = self::ID;

    protected $personIds = self::PERSON_IDS;


    public function __construct()
    {
        $this->endDate = new \DateTime(self::END_DATE);
        $this->startDate = new \DateTime(self::START_DATE);
    }
}
