<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = ['user_id' ,'facebook' , 'avatar' , 'youtube', 'about' ];
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
