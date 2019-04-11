<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    //
    protected $guarded = ['id'];

    public function request(){
        return $this->has('App\Models\Request');
    }
}
