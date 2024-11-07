<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $primaryKey = 'schedule_id';
    
    protected $guarded = [];

    public function luponCase(): BelongsTo
    {
        return $this->belongsTo(LuponCase::class, 'case_id');
    }
}
