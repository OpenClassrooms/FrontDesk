<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
final class ApiDateFormat
{
    const DATE_FORMAT_FULL = 'Y-m-d H:i:s';

    const DATE_FORMAT_MIN = 'Y-m-d';

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}
