<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ngo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','email', 'location','contact','registration_id','type'];
    public $timestamps = true;

    public function donors(){
        $this->hasMany('App\Models\Donor');
    }
}
