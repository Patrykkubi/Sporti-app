<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    //protected $dates= ['date_of_the_meeting'];
   // protected $dateFormat='Y-m-d H:i:s.u';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function members(){
        return $this->belongsToMany('App\Models\User','post_member','post_id', 'member_id');
    }

    public function applications(){
        return $this->hasMany('App\Models\application');
    }

    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }
}
