<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccineRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'pet_id',
        'vet_id',
        'next_dose'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function vet()
    {
        return $this->hasOne(Vet::class);
    }
}
