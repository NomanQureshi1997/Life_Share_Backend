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
    protected $fillable = ['blood_group', 'phone', 'age','idle_date','active_date','is_active'];
    public function ngos(){
        $this->belongsTo('App\Models\Ngo');
    }
}
