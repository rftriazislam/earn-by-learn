<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'country' => ['required', 'string', 'max:80'],
            'refered_id' => ['nullable', 'exists:users,id'],
            'state' => ['required', 'string', 'max:80'],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:21', 'unique:users,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public  function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
    protected function create(array $data)
    {
        $p = $this->getUserIP();
        // https://api.ipstack.com/134.201.250.155? access_key = YOUR_ACCESS_KEY    // paid
        $ip =   Http::get('https://ipapi.co/' .  $p . '/json/')->json();
        if (!empty($ip['error'])) {
            $ip['latitude'] = 'ip error';
            $ip['longitude'] = 'ip error';
        }
        $lat = is_float($ip['latitude']);
        $lon = is_float($ip['longitude']);
        return User::create([
            'country' => $data['country'],
            'country_code' => $data['country_code'],
            'state' => $data['state'],
            'currency' => $data['currency'],
            'flag' => $data['flag'],
            'latitude' => ($lat == true) ? $ip['latitude'] : 'Null',
            'longitude' => ($lon == true) ? $ip['longitude'] : 'Null',
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}