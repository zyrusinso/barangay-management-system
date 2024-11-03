<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalReferral extends Model
{
    use HasFactory;

    protected $primaryKey = 'referral_id';
    protected $guarded = [];
}
