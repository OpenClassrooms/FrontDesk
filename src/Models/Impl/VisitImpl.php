<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitImpl extends Visit
{
    const DATE_FORMAT_FULL = 'Y-m-d H:i:s';

    const DATE_FORMAT_MIN = 'Y-m-d';

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            [
                'cancelled_at'     => $this->cancelledAt !== null ? $this->cancelledAt->format(
                    self::DATE_FORMAT_FULL
                ) : null,
                'completed_at'     => $this->completedAt !== null ? $this->completedAt->format(
                    self::DATE_FORMAT_FULL
                ) : null,
                'created_at'       => $this->createdAt !== null ? $this->createdAt->format(
                    self::DATE_FORMAT_FULL
                ) : null,
                'event_occurrence' => $this->eventOccurrence,
                'id'               => $this->id,
                'no_show_at'       => $this->noShowAt,
                'paid'             => $this->paid,
                'registeredAt'     => $this->registeredAt,
                'status'           => $this->status,
            ],
        ];
    }

}
