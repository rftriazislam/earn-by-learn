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
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->condition_check == 'check') {
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
        return view('user_panel.register.create');
    }
}