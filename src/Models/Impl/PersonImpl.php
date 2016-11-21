<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\ApiDateFormat;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonImpl extends Person implements \JsonSerializable
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'address'                   => $this->address,
            'birthdate'                 => $this->birthdate !== null ? $this->birthdate->format(
                ApiDateFormat::DATE_FORMAT_MIN
            ) : null,
            'custom_fields'             => $this->customFields,
            'email'                     => $this->email,
            'first_name'                => $this->firstName,
            'guardian_email'            => $this->guardianEmail,
            'guardian_name'             => $this->guardianName,
            'id'                        => $this->id,
            'joined_at'                 => $this->joinedAt !== null ? $this->joinedAt->format(DATE_ISO8601) : null,
            'last_name'                 => $this->lastName,
            'location_id'               => $this->locationId,
            'middle_name'               => $this->middleName,
            'phone'                     => $this->phone,
            'send_invite'               => $this->sendInvite,
            'skip_complimentary_passes' => $this->skipComplimentaryPasses,
        ];
    }
}
