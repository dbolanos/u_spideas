<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as RequestStudent;

class StudentController extends Controller
{
    //
    public function showRequestStudent(){
        $student = Student::where('user_id', Auth::id())->first();
        $student_requests = RequestStudent::where('student_id', $student->id)->paginate(10);

        return view('student.request.index', compact('student_requests'));
    }

}
