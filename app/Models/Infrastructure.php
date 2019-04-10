<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    //
    protected $guarded = ['id'];

    public function request(){
        return $this->belongsTo('App\Models\Request');
    }
}
