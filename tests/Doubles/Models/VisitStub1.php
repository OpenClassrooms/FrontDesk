<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\VisitImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitStub1 extends VisitImpl
{
    const CANCELLED_AT = '2016-09-27 15:30:06';

    const COMPLETED_AT = '2016-01-12 18:30:06';

    const CREATED_AT = '2016-03-01 05:22:06';

    const EVENT_OCCURRENCE = 2314;

    const ID = 12;

    const NO_SHOW_AT = '2016-05-01 05:22:06';

    const PAID = true;

    const PAID_FOR_BY = 'untel';

    const REGISTERED_AT = '2016-04-01 05:22:06';

    const STATUS = 'VisitStatus';

    protected $eventOccurrence = self::EVENT_OCCURRENCE;

    protected $id = self::ID;

    protected $paid = self::PAID;

    protected $paidForBy = self::PAID_FOR_BY;

    protected $status = self::STATUS;

    public function __construct()
    {
        $this->cancelledAt = new \DateTime(self::CANCELLED_AT);
        $this->completedAt = new \DateTime(self::COMPLETED_AT);
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->noShowAt = new \DateTime(self::NO_SHOW_AT);
        $this->registeredAt = new \DateTime(self::REGISTERED_AT);
    }
}
