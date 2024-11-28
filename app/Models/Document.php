<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_id';
    protected $guarded = [];

    public function luponCase(): BelongsTo
    {
        return $this->belongsTo(LuponCase::class, 'case_id');
    }

    public function lupon(): BelongsTo
    {
        return $this->belongsTo(Lupon::class, 'uploaded_by');
    }
}
