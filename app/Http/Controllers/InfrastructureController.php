<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    //

    public function index(){
        $infrastructures = Infrastructure::paginate(10);

        return view('admin.infrastructures.index', compact('infrastructures'));
    }

    public function create(){
        return view('admin.infrastructures.create');
    }

    public function generateInfrastructure(Request $request){
        $request->validate([
            'descrip_infra' => 'required|string|max:255',
        ]);

        $new_infrastructure = Infrastructure::create(
            [
                'description' => $request->descrip_infra
            ]
        );
        $message   = ['type_message' => 'success', 'msg' => 'Se ha creado la infraestructura con exito! Infraestructura #'. $new_infrastructure->id];
        return redirect()->route('all.infrastructures')->with('message', $message);
    }

    public function edit($id){
        try{
            $infrastructure = Infrastructure::find($id);

            return view('admin.infrastructures.edit', compact('infrastructure'));
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en edit_infrastructure, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'No se ha encontrado la infraestructura #'. $id];
            return redirect()->route('all.infrastructures')->with('message', $message);
        }

    }

    public function update(Request $request){
        try{
            $infrastructure = Infrastructure::find($request->infrastructure_id);

            $infrastructure->description = $request->descrip_infra;

            $infrastructure->save();

            $message   = ['type_message' => 'success', 'msg' => 'Se ha actualizado la infraestructura con exito! Infraestructura #'. $infrastructure->id];
            return redirect()->route('all.infrastructures')->with('message', $message);
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en update_infrastructure, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Ha ocurrido un error con la infraestructura #'. $request->infrastructure_id];
            return redirect()->route('all.infrastructures')->with('message', $message);
        }

    }

    public function delete($id){
        try{
            $infrastructure = Infrastructure::find($id);

            $infrastructure->forceDelete();

            $message   = ['type_message' => 'success', 'msg' => 'Se ha borrado la infraestructura con exito!'];
            return redirect()->route('all.infrastructures')->with('message', $message);
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en delete_infrastructure, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Ha ocurrido un error con la infraestructura #'. $id];
            return redirect()->route('all.infrastructures')->with('message', $message);
        }
    }

}
