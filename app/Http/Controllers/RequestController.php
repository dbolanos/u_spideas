<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Infrastructure;
use App\Models\Period;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //

    public function create(){
        $infraestructures   = Infrastructure::all();
        $events             = Event::all();
        $periods            = Period::all();
        return view('admin.request.create', compact('infraestructures', 'events', 'periods'));
    }
}
