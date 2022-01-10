<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;
    protected $fillable = ['donor_name', 'donor_age', 'donor_weight','phone_no','blood_group','is_accpeted','bag_id','date','ngo_id'];
}
