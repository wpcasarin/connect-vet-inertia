<?php

namespace App\Models;

use Parental\HasParent;

class Vet extends User
{
    use HasParent;

    protected $hidden = [
        'password',
        'tutor_cpf',
    ];

    public function impersonate($user)
    {
        //...
    }

    public function patients()
    {
        return $this->hasMany(Pet::class, 'vet_id');
    }
}
