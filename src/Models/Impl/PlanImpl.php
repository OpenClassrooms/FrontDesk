<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Plan;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PlanImpl extends Plan implements \JsonSerializable
{
    const DATE_FORMAT_FULL = 'Y-m-d H:i:s';

    const DATE_FORMAT_MIN = 'Y-m-d';

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'canceled_at'     => $this->canceledAt !== null ? $this->canceledAt->format(
                self::DATE_FORMAT_FULL
            ) : null,
            'consider_member' => $this->considerMember,
            'count'           => $this->count,
            'created_at'      => $this->createdAt !== null ? $this->createdAt->format(
                self::DATE_FORMAT_FULL
            ) : null,
            'description'     => $this->description,
            'end_date'        => $this->endDate !== null ? $this->endDate->format(self::DATE_FORMAT_MIN) : null,
            'id'              => $this->id,
            'location_id'     => $this->locationId,
            'name'            => $this->name,
            'person_ids'      => $this->personIds,
            'plan_product_id' => $this->planProductId,
            'price_cents'     => $this->priceCents,
            'start_date'      => $this->startDate !== null ? $this->startDate->format(self::DATE_FORMAT_MIN) : null,
            'staff_member_id' => $this->staffMemberId,
            'type'            => $this->type,
            'updated_at'      => $this->updateAt !== null ? $this->updateAt->format(self::DATE_FORMAT_MIN) : null,
        ];
    }
}
