<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PlanImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanStub1 extends PlanImpl
{
    const CREATED_AT = '2016-09-27 15:30:06';

    const ID = 1;

    const NAME = 'Plan Stub 1 name';

    const PERSON_IDS = [1];

    const START_DATE = '2016-09-27';

    public function __construct()
    {
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->id = self::ID;
        $this->name = self::NAME;
        $this->personIds = self::PERSON_IDS;
        $this->startDate = new \DateTime(self::START_DATE);
    }
}
