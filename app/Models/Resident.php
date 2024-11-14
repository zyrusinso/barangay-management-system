<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Resident extends Model
{
    use HasFactory;

    protected $primaryKey = 'resident_id';
    protected $guarded = [];

    public function medicalReferrals(): HasMany
    {
        return $this->hasMany(MedicalReferral::class, 'resident_id');
    }

    public function luponCases(): HasMany
    {
        return $this->hasMany(LuponCase::class, 'resident_id');
    }

    protected function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }
}
