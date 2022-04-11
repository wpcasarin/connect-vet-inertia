<?php

namespace App\Models;

use Parental\HasParent;

class Admin extends User
{
    use HasParent;

    protected $hidden = [
        'password',
        'tutor_cpf',
        'vet_crmv'
    ];

    public function impersonate($user)
    {
        //...
    }
}
