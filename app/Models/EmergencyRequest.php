<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyRequest extends Model
{
    use HasFactory;
    protected $fillable = ['patient', 'group', 'city','state','hospital','contact_person','contact_phone','contact_email','date'];
}
