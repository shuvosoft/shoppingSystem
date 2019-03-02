<?php

namespace App\Http\Controllers\Auth\Admin;

use App\District;
use App\Division;
use App\Notifications\VerifyRegistration;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority','asc')->get();
        $districts= District::orderBy('name','asc')->get();
        return view('auth.register',compact('divisions','districts'));
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
            'first_name' => 'required|string|max:30',
            'last_name' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_no' => 'required|max:15',
            'street_address' => 'required|max:100',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $user = User::create([
            'first_name' => $data['first_name'],
            'username' => str_slug($data['first_name']),
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'phone_no' => $data['phone_no'],
            'street_address' => $data['street_address'],
            'ip_address' => request()->ip(),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
           'remember_token'  =>str_random(50),
           'status'  => 0,
        ]);


        $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
        return redirect('/');;
    }
}
