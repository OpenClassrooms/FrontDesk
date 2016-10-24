<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Impl\VisitImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitStub1 extends VisitImpl
{
    const ID = 1;

    public function __construct()
    {
        $this->id = self::ID;
    }
}
