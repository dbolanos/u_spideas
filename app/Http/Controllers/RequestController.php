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
}
