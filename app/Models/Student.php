<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function requests(){
        return $this->hasMany('App\Models\Request');
    }

    public function getFullName(){
        return $this->first_name .' '. $this->first_surname .' '. $this->second_surname;
    }
}
