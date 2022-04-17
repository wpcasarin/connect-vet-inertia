<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'vet_id',
        'name',
        'sex',
        'specie',
        'date_of_birth',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }

    public function vaccines()
    {
        return $this->hasMany(VaccineRecord::class);
    }
}
