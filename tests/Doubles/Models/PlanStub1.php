<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PlanImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanStub1 extends PlanImpl
{
    const ID = 1;

    const CREATED_AT = '2016-09-27 15:30:06';

    const NAME = "Plan Stub 1 name";

    const PERSON_IDS = [1];

    const START_DATE = '2016-09-27 20:30:06';

    public function __construct()
    {
        $this->id = self::ID;
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->name = self::NAME;
        $this->personIds = self::PERSON_IDS;
        $this->startDate = new \DateTime(self::START_DATE);

    }
}
