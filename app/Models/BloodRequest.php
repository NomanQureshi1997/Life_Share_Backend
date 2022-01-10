<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    protected $fillable = ['patient', 'blood', 'city','district','state','hospital','contact_person','contact_phone','contact_email','when','date'];

}
