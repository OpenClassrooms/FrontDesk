<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\ApiDateFormat;
use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackImpl extends Pack implements \JsonSerializable
{

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'pack' => [
                'count'      => $this->count,
                'end_date'   => $this->endDate !== null ? $this->endDate->format(
                    ApiDateFormat::DATE_FORMAT_FULL
                ) : null,
                'id'         => $this->id,
                'person_ids' => $this->personIds,
                'start_date' => $this->startDate !== null ? $this->startDate->format(
                    ApiDateFormat::DATE_FORMAT_FULL
                ) : null,
            ],
        ];
    }
}
