<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use App\Models\Event;
use App\Models\Student;
use App\Models\Request as RequestStudent;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function showReport(){
        $result = [];
        $result['count_students']           = Student::count();
        $result['count_request']            = RequestStudent::count();
        $result['count_request_pending']    = RequestStudent::where('request_status_id', 1)->count();
        $result['count_request_approved']   = RequestStudent::where('request_status_id', 2)->count();
        $result['count_request_finish']     = RequestStudent::where('request_status_id', 3)->count();
        $result['count_request_block']      = RequestStudent::where('request_status_id', 4)->count();
        $result['events']                   = Event::all();
        $result['infrastructure']           = Infrastructure::all();

        return view('admin.report.report', compact('result'));

    }
}
