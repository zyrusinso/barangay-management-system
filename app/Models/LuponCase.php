<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LuponCase extends Model
{
    use HasFactory;

    protected $primaryKey = 'case_id';
    protected $guarded = [];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'case_id');
    }

    public function lupon(): BelongsTo
    {
        return $this->belongsTo(Lupon::class, 'lupon_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'case_id');
    }

    public function medicalReferrals(): HasMany
    {
        return $this->hasMany(MedicalReferral::class, 'case_id');
    }

    public function escalatedCases(): HasMany
    {
        return $this->hasMany(EscalatedCase::class, 'case_id');
    }
}
