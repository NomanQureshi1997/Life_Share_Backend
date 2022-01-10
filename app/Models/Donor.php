<?php

namespace App\Models;

use Google\CRC32\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'phone', 'age','weight','blood','gender','city','address', 'email', 'ngo_id','last_donated'];
}