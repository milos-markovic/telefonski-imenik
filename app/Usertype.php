<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    protected $table = 'usertype';
    
    public $timestamps = false;
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
