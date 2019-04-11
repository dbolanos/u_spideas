<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 11/4/2019
 * Time: 9:45 AM
 */

namespace App\Util;

use App\Models\Student;

class SearchStudent{

    private $student_id;
    private $first_surname;
    private $identification_card;



    public function __construct($request){
        $this->student_id           = $request->student_id;
        $this->first_surname        = $request->first_surname;
        $this->identification_card  = $request->identification_card;
    }

    public function getFilterStudent(){

        $query = Student::select('id',
            'first_name',
            'first_surname',
            'second_surname',
            'identification_card',
            'email');

        if(!is_null($this->student_id)){
            $query->where('id', $this->student_id);
        }
        if(!is_null($this->identification_card)){
            $query->orWhere('identification_card', $this->identification_card);
        }
        if(!is_null($this->first_surname)){
            $query->orWhere('first_surname','like', '%'.$this->first_surname.'%');
        }
        \Log::info('paso');

        return $query->orderBy('id')->take(10)->get();
    }
}
