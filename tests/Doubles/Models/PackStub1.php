<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\PackImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackStub1 extends PackImpl
{
    const COUNT = '999999';

    const END_DATE = '2017-12-08';

    const ID = 6473;

    const PACK_PRODUCT_ID = 340441;

    const PERSON_IDS = [PersonStub1::ID];

    const START_DATE = '2016-08-30';

    protected $count = self::COUNT;

    protected $id = self::ID;

    protected $packProductId = self::PACK_PRODUCT_ID;

    protected $personIds = self::PERSON_IDS;

    public function __construct()
    {
        $this->endDate = new \DateTime(self::END_DATE);
        $this->startDate = new \DateTime(self::START_DATE);
    }
}
