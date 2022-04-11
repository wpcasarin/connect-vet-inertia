<?php

namespace App\Models;

use Parental\HasParent;

class Tutor extends User
{
    use HasParent;

    protected $hidden = [
        'password',
        'vet_crmv'
    ];

    public function impersonate($user)
    {
        //...
    }

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
