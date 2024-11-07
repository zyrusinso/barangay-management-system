<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalReferral extends Model
{
    use HasFactory;

    protected $primaryKey = 'referral_id';
    protected $guarded = [];

    public function luponCase(): BelongsTo
    {
        return $this->belongsTo(LuponCase::class, 'case_id');
    }

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
}
