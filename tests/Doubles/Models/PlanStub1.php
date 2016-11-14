<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PlanImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanStub1 extends PlanImpl
{
    const CANCELED_AT = '2017-03-20 15:30:06';

    const CONSIDER_MEMBER = false;

    const COUNT = 22;

    const CREATED_AT = '2016-09-27 15:30:06';

    const DESCRIPTION = 'planDescription';

    const END_DATE = '2017-09-27';

    const ID = 1;

    const LOCATION_ID = 2222;

    const NAME = 'Plan Stub 1 name';

    const PERSON_IDS = [PersonStub1::ID];

    const PLAN_PRODUCT_ID = 33;

    const PRICE_CENTS = 15;

    const STAFF_MEMBER_ID = 999;

    const START_DATE = '2016-09-27';

    const TYPE = "planType";

    const UPDATED_AT = '2016-10-12';

    protected $considerMember = self::CONSIDER_MEMBER;

    protected $count = self::COUNT;

    protected $description = self::DESCRIPTION;

    protected $id = self::ID;

    protected $locationId = self::LOCATION_ID;

    protected $name = self::NAME;

    protected $personIds = self::PERSON_IDS;

    protected $planProductId = self::PLAN_PRODUCT_ID;

    protected $priceCents = self::PRICE_CENTS;

    protected $staffMemberId = self::STAFF_MEMBER_ID;

    protected $type = self::TYPE;

    public function __construct()
    {
        $this->canceledAt = new \DateTime(self::CANCELED_AT);
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->endDate = new \DateTime(self::END_DATE);
        $this->startDate = new \DateTime(self::START_DATE);
        $this->updateAt = new \DateTime(self::UPDATED_AT);
    }
}
