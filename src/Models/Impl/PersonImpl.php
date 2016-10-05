<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

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
            'person' => [
                'address'    => $this->address,
                'email'      => $this->email,
                'first_name' => $this->firstName,
                'id'         => $this->id,
                'joined_at'  => $this->joinedAt->getTimestamp(),
                'last_name'  => $this->lastName,
                'phone'      => $this->phone,
            ],
        ];
    }
}
