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

    const CREATED_AT = '2016-3-01 05:22:06';

    const ID = 1;

    public function __construct()
    {
        $this->cancelledAt = new \DateTime(self::CANCELLED_AT);
        $this->completedAt = new \DateTime(self::COMPLETED_AT);
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->id = self::ID;
    }
}
