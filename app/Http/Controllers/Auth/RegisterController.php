<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'            => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'first_surname'         => ['required', 'string', 'max:255'],
            'second_surname'        => ['required', 'string', 'max:255'],
            'identification_card'   => ['required', 'string', 'max:12'],
            'password'              => 'required|string|min:8|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[.,;!$#%@*-\/_+&()=]).*$/',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = '';

        // &$User the changes made inside the function will reflect in the variables ($user that is out of the transaction function) because '&' creates a reference of the variable.
        DB::transaction(function () use ($data, &$user) {
            $user = User::create([
                'name'          => $data['first_name'] . ' ' . $data['first_surname'] .' '. $data['second_surname'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
            ]);

            Student::create([
                'first_name'            => $data['first_name'],
                'first_surname'         => $data['first_surname'],
                'second_surname'        => $data['second_surname'],
                'email'                 => $data['email'],
                'identification_card'   => $data['identification_card'],
                'user_id'               => $user->id,
            ]);

            //Attach Student role
            $user->roles()->attach(2);
        });

        return $user;
    }
}
