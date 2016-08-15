<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email','password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function address(){
        return $this->hasMany('App\Address');
    }
    public function usertype(){
        return $this->belongsTo('App\Usertype');
    }
}
