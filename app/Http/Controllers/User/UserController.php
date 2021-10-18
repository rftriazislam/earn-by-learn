<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function register_second_part()
    {
        $user = User::with(['mentor' => function ($q) {
            $q->select('id', 'refered_id')->with('mentor_payment:id,user_id,method_name')->with(['mentor' => function ($q) {
                $q->select('id', 'refered_id')->with(['mentor_payment:id,user_id,method_name']);
            }]);
        }])->where('id', Auth::user()->id)->first();

        if ($user->condition_check == 'check' && !empty($user->mentor->mentor_payment) && !empty($user->mentor->mentor->mentor_payment)) {

            return redirect()->route('register.final');
        } else {
            return view('user_panel.register.register_details');
        }
    }
    public function create(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->update(['condition_check' => $request->condition_check]);

        return redirect()->route('register.final');
    }

    public function create_final()
    {
        $user = User::with(['mentor' => function ($q) {
            $q->select('id', 'refered_id')->with('mentor_payment:id,user_id,method_name')->with(['mentor' => function ($q) {
                $q->select('id', 'refered_id')->with(['mentor_payment:id,user_id,method_name']);
            }]);
        }])->where('id', Auth::user()->id)->first();


        // echo $user->mentor->mentor_payment;
        // exit();
        return view('user_panel.register.create', compact('user'));
    }
}