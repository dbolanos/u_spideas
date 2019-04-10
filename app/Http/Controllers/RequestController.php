<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Infrastructure;
use App\Models\Period;
use App\Models\Request as RequestStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //

    public function createRequestStudent(){
        $infrastructures   = Infrastructure::all();
        $events             = Event::all();
        $periods            = Period::all();
        return view('student.request.create', compact('infrastructures', 'events', 'periods'));
    }

    public function getRulesCreateRequest(){
        return [
            'period'   =>  ['required', 'integer'],
            'infra'    =>  ['required', 'integer'],
            'event'    =>  ['required', 'integer'],
        ];
    }

    public function generateRequestStudent(Request $request){
        Validator::make($request->all(), $this->getRulesCreateRequest())->validate();
        $student = Student::where('user_id', Auth::id())->first();
        $request_student = RequestStudent::create(
                                [
                                    'student_id'            => $student->id,
                                    'infrastructure_id'    => $request->infra,
                                    'event_id'              => $request->event,
                                    'period_id'             => $request->period,
                                ]
        );
        $message   = ['type_message' => 'success', 'msg' => 'La solicitud ha sido creada con exito! Solicitud #'. $request_student->id];

        return redirect()->route('my.student.requests')->with('message', $message);
    }

    public function editRequestStudent($id){
        try{
            $student_request = RequestStudent::find($id);
            $infrastructures   = Infrastructure::all();
            $events             = Event::all();
            $periods            = Period::all();

            return view('student.request.edit', compact('student_request','infrastructures', 'events', 'periods'));

        }catch(\Exception $e){
            \Log::error('Error find RequestStudent, id: ' . $id .' Message: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Error, No se encontró la solicitud! Solicitud #'. $id];
            return redirect()->route('my.student.requests')->with('message', $message);

        }
    }

    public function updateRequestStudent(Request $request){
        Validator::make($request->all(), $this->getRulesCreateRequest())->validate();
        $request_student = RequestStudent::find($request->student_request_id);
        $request_student->infrastructure_id = $request->infra;
        $request_student->event_id          = $request->event;
        $request_student->period_id         = $request->period;
        $request_student->save();
        $message   = ['type_message' => 'success', 'msg' => 'La solicitud ha sido actualizada con exito! Solicitud #'. $request_student->id];
        return redirect()->route('my.student.requests')->with('message', $message);
    }

    public function delete($id){
        try{
            $student_request = RequestStudent::find($id);

            $student_request->forceDelete();

            $message   = ['type_message' => 'success', 'msg' => 'Se ha borrado la solicitud con exito!'];
            return redirect()->route('my.student.requests')->with('message', $message);
        }catch(\Exception $e){
            \Log::error('Ha ocurrido un error en delete_studentRequest, Mensaje: ' .$e->getMessage());
            $message   = ['type_message' => 'danger', 'msg' => 'Ha ocurrido un error con la solicitud #'. $id];
            return redirect()->route('my.student.requests')->with('message', $message);
        }
    }
}
