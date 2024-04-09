<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Mail;

use App\Mail\userregisterMail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'dob' => ['required', 'date'],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ]);
    }

    protected function create(array $data)
    {
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
        ]);
        // Send email to the user
        // Mail::to($user->email)->send(new UserRegisterMail($data));

        // return $user;
    }

    // protected function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'gender' => $data['gender'],
    //         'dob' => $data['dob'],
    //         'country_id' => $data['country_id'],
    //         'state_id' => $data['state_id'],
    //         'city_id' => $data['city_id'],
    //     ]);

    //     // Send email to the user
    //     Mail::to($user->email)->send(new UserRegisterMail($data));

    //     return $user;
    // }



    public function getCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }


    public function getStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }


    public function getCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}
