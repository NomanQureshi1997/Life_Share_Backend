<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_no','message', 'guard_name'];

}