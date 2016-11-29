<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\ApiDateFormat;
use OpenClassrooms\FrontDesk\Models\Plan;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanImpl extends Plan implements \JsonSerializable
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'cancelled_at'    => $this->canceledAt !== null ? $this->canceledAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'consider_member' => $this->considerMember,
            'count'           => $this->count,
            'created_at'      => $this->createdAt !== null ? $this->createdAt->format(
                ApiDateFormat::DATE_FORMAT_FULL
            ) : null,
            'description'     => $this->description,
            'end_date'        => $this->endDate !== null ? $this->endDate->format(
                ApiDateFormat::DATE_FORMAT_MIN
            ) : null,
            'id'              => $this->id,
            'location_id'     => $this->locationId,
            'name'            => $this->name,
            'person_ids'      => $this->personIds,
            'plan_product_id' => $this->planProductId,
            'price_cents'     => $this->priceCents,
            'start_date'      => $this->startDate !== null ? $this->startDate->format(
                ApiDateFormat::DATE_FORMAT_MIN
            ) : null,
            'staff_member_id' => $this->staffMemberId,
            'type'            => $this->type,
            'updated_at'      => $this->updateAt !== null ? $this->updateAt->format(
                ApiDateFormat::DATE_FORMAT_MIN
            ) : null,
        ];
    }
}
