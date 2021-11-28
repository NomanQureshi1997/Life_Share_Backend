<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_no','message','required_blood','guard_name'];

}
