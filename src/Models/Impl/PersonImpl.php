<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonImpl extends Person
{
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'person' => [
                'address'    => $this->address,
                'email'      => $this->email,
                'first_name' => $this->firstName,
                'id'         => $this->id,
                'joined_at'  => $this->joinedAt,
                'last_name'  => $this->lastName,
                'phone'      => $this->phone,
            ]
        ];
    }
}
