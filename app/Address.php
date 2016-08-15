<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    
    protected $fillable = ['firstName','lastName','street','city','areaCode','phoneNumber','email'];
    
    
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstName'] = ucfirst($value);
    }
     public function setLasttNameAttribute($value)
    {
        $this->attributes['lastName'] = ucfirst($value);
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
