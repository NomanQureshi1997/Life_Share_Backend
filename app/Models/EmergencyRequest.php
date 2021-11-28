<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_no','message','blood_group','location', 'guard_name'];

}
