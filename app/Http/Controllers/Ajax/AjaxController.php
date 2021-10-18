<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AjaxController extends Controller
{



    public function payment_method(Request $request)
    {
        $mentor_1 = Auth::user()->refered_id;
        $mentor2 = User::where('id', $mentor_1)->first();
        $mentor_2 = $mentor2->refered_id;
    }
}