<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\ApiDateFormat;
use OpenClassrooms\FrontDesk\Models\Visit;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class VisitImpl extends Visit implements \JsonSerializable
{

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'cancelled_at'     => $this->cancelledAt !== null ? $this->cancelledAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'completed_at'     => $this->completedAt !== null ? $this->completedAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'created_at'       => $this->createdAt !== null ? $this->createdAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'event_occurrence' => $this->eventOccurrence,
            'id'               => $this->id,
            'noshow_at'        => $this->noShowAt !== null ? $this->noShowAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'paid'             => $this->paid,
            'paid_for_by'      => $this->paidForBy,
            'registered_at'    => $this->registeredAt !== null ? $this->registeredAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'status'           => $this->status,
        ];
    }
}
