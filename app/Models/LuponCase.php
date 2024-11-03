<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
class LuponCase extends Model
{
    use HasFactory;

    protected $primaryKey = 'case_id';
    protected $guarded = [];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'case_id');
    }
}
