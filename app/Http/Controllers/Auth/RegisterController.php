<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
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

    protected function validateRegister(Request $request)
    {
        return $this->validate($request ,
            [
                'name' => 'required',
                'mobile' => 'required|unique:users|numeric|regex:/^(09)([0-9]{9})$/',
                'password' => 'required|string|min:6',
                'rpassword' => 'required_with:password|same:password'
            ],
            [
                'name.required' => 'نام خود را وارد کنید',
                'mobile.regex' => 'شماره موبایل صحیح نیست',
                'mobile.unique' => 'این شماره موبایل قبلا ثبت نام شده است',
                'password.min' => 'رمز عبور نباید کمتر از 6 کاراکتر باشد',
                'rpassword.required_with' => 'رمز عبور و تکرار آن یکسان نیستند',
                'rpassword.same' => 'رمز عبور و تکرار آن یکسان نیستند',
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
        return User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'code' => '12345',
        ]);
    }

    public function register(Request $request)
    {
        session()->flash('password' , $request->password);

        $this->validateRegister($request);

        $this->create($request->all());

        return view('auth.code' , ['mobile' => $request->mobile]);
    }
}
