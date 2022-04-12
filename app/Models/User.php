<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Parental\HasChildren;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasChildren;

    protected $childTypes = [
        'ADMIN' => Admin::class,
        'TUTOR' => Tutor::class,
        'VET'   => Vet::class
    ];

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'tutor_cpf',
        'vet_crmv'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
