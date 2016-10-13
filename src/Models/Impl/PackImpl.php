<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackImpl extends Pack implements \JsonSerializable
{
    const DATE_FORMAT = 'yyyy-MM-dd';

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'pack' => [
                'count'      => $this->count,
                'end_date'   => $this->endDate,
                'id'         => $this->id,
                'person_ids' => $this->personIds,
                'start_date' => $this->startDate,
            ],
        ];
    }
}
