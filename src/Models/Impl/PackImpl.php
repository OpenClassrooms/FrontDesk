<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Pack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackImpl extends Pack
{
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'person' => [
                'count'       => $this->count,
                'end_date'    => $this->endDate,
                'id'          => $this->id,
                'persons_ids' => $this->personIds,
                'start_date'  => $this->startDate,
            ]
        ];
    }
}
