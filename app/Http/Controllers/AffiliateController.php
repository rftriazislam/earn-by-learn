<?php

namespace App\Http\Controllers;

use App\Models\StudentLevel;
use App\Models\User;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function referral_link($id)
    {
        $num = is_numeric($id);
        if ($num == true) {
            $id = $id;
            $use =   User::with('student_level')->where('id', $id)->first();

            if (empty($use->student_level)) {
                $id = 'Invalid Link';
                return view('auth.error_register', compact('id'));
            } else {
                $check = StudentLevel::where('first_mentor_id', $id)->count();
                if ($check < 10) {
                    return view('auth.reff_register', compact('id'));
                } else {
                    $id = 'Close This Link ';
                    return view('auth.error_register', compact('id'));
                }
            }
        } else {
            $id = 'Invalid Link';
            return view('auth.error_register', compact('id'));
        }
    }
}