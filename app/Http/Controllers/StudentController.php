<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function showRequestStudent(){
        $student_requests = RequestStudent::where('student_id', Auth::id())->paginate(10);

        return view('student.request.index', compact('student_requests'));
    }

}
