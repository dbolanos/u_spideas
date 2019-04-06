<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        $events = Event::paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create(){
        return view('admin.events.create');
    }

    public function generateEvent(Request $request){
        $request->validate([
            'descrip_event' => 'required|string|max:255',
        ]);

        $new_event = Event::create(
                [
                    'description' => $request->descrip_event
                ]
        );
        $message   = ['type_message' => 'success', 'msg' => 'Se ha creado el evento con exito! Evento #'. $new_event->id];
        return redirect()->route('all.events')->with('message', $message);
    }

}
