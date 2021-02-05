<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiZoho\ApiZoho\ApiZoho;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\LowerCase;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => ['required', 'alpha_num', 'max:255', 'unique:users', new LowerCase],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', new PhoneNumber],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {

        return view('auth.register', [
            'user' => new User()
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $obj = new ApiZoho('Leads');
        $request = [
            [
                'Firt_Name' => $data['name'],
                'Last_Name' => $data['name'],
                'Email' => $data['email'],
                'Mobile' => $data['mobile']
            ]
        ];
        $obj->insertRecord($request);
        return User::create([
            'user' => strtolower($data['user']),
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'id_sibila' => 1,//$obj->content['data'][0]['details']['id'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
