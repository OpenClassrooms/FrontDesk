<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PlanImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanStub1 extends PlanImpl
{
    const CANCELED_AT = '2017-03-20 15:30:06';

    const CREATED_AT = '2016-09-27 15:30:06';

    const END_DATE = '2017-09-27';

    const ID = 1;

    const NAME = 'Plan Stub 1 name';

    const PERSON_IDS = [1];

    const START_DATE = '2016-09-27';

    const UPDATED_AT = '2016-10-12';

    public function __construct()
    {
        $this->canceledAt = new \DateTime(self::CANCELED_AT);
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->endDate = new \DateTime(self::END_DATE);
        $this->id = self::ID;
        $this->name = self::NAME;
        $this->personIds = self::PERSON_IDS;
        $this->startDate = new \DateTime(self::START_DATE);
        $this->updateAt = new \DateTime(self::UPDATED_AT);
    }
}
