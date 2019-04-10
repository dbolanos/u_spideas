<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    public function infrastructure(){
        return $this->belongsTo('App\Models\Infrastructure');
    }

    public function period(){
        return $this->belongsTo('App\Models\Period');
    }
}
