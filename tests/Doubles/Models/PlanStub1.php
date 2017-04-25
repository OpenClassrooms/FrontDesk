<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use Carbon\Carbon;
use OpenClassrooms\FrontDesk\Models\Impl\PlanImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanStub1 extends PlanImpl
{
    const CONSIDER_MEMBER = false;

    const COUNT = 22;

    const DESCRIPTION = 'planDescription';

    const END_DATE = '2017-09-27';

    const ID = 1;

    const LOCATION_ID = 2222;

    const NAME = 'Plan Stub 1 name';

    const PERSON_IDS = [PersonStub1::ID];

    const PLAN_PRODUCT_ID = 33;

    const PRICE_CENTS = 15;

    const STAFF_MEMBER_ID = 999;

    const TYPE = 'planType';

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
        $this->canceledAt = new \DateTime(Carbon::now()->subMinute());
        $this->createdAt = new \DateTime(Carbon::now()->subYear());
        $this->endDate = new \DateTime(Carbon::now()->addMonth());
        $this->startDate = new \DateTime(Carbon::now()->subMonth());
        $this->updateAt = new \DateTime(Carbon::now()->addMinute());
    }
}
