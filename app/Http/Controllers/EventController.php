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

    public function edit($id){
        try{
            $event = Event::find($id);

            return view('admin.events.edit', compact('event'));
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en edit_event, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'No se ha encontrado el evento #'. $id];
            return redirect()->route('all.events')->with('message', $message);
        }

    }

    public function update(Request $request){
        try{
            $event = Event::find($request->event_id);

            $event->description = $request->descrip_event;

            $event->save();

            $message   = ['type_message' => 'success', 'msg' => 'Se ha actualizado el evento con exito! Evento #'. $event->id];
            return redirect()->route('all.events')->with('message', $message);
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en update_event, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Ha ocurrido un error con el evento #'. $request->event_id];
            return redirect()->route('all.events')->with('message', $message);
        }

    }

    public function delete($id){
        try{
            $event = Event::find($id);

            $event->forceDelete();

            $message   = ['type_message' => 'success', 'msg' => 'Se ha borrado el evento con exito!'];
            return redirect()->route('all.events')->with('message', $message);
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en delete_event, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Ha ocurrido un error con el evento #'. $id];
            return redirect()->route('all.events')->with('message', $message);
        }
    }


}
