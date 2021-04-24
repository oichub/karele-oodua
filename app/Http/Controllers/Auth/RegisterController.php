<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'admin':
            $this->redirectTo ='/users/admin/dashboard';
            return $this->redirectTo;
                break;
            case 'user':
                    $this->redirectTo ='/users/dashboard';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }
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
        $validator= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'required|numeric|digits_between:6,15|unique:users,phone,except,id',
            'country' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'register_password' => ['required', 'string', 'min:5', 'confirmed'],
            'T&C' => 'required|string',
            'dob' => 'required|date',
        ], [
            'name.required' => 'Name is required',
            'name.string' => 'Invalid name',
            'name.max' => 'The expected words is exceeded',
            'phone.required' => "Phone is required",
            "phone.numeric" => 'Invalid number',
            "phone.number" => 'Invalid number',
            "phone.digit_between" => 'Invalid number',
            'register_email.required' => "Email is required",
            'register_email.max' => "Expected maximum email is exceeded",
            'register_email.unique' => "Email already exist",
            'country.string' => "Invalid country name",
            'T&C.required' => "Check our terms and conditions",
            'dob.required' => 'Date of birth is required',
            'dob.date' => 'Enter valid date',
        ]);
        return $validator;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return $data;
        return User::create([
            'name' => $data['name'],
            'email' => $data['register_email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'role' => "user",
            'balance' => 0.00,
            'slug' =>strtolower(str_replace(" ", "-", $data['name'])).time(),
            'totalsub' =>0,
            'password' => Hash::make($data['register_password']),
            'dob' => $data['dob'],
        ]);
    }
}
