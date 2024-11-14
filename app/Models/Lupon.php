<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Lupon extends Model
{
    use HasFactory;

    protected $primaryKey = 'lupon_id';
    protected $guarded = [];

    public function cases(): HasMany
    {
        return $this->hasMany(LuponCase::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function escalatedCases(): HasMany
    {
        return $this->hasMany(EscalatedCase::class, 'escalated_by');
    }

    protected function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }
}

