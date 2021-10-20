<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use App\Models\StudentLevel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main.home');
    }

    public function rafa_payment()
    {
        $user =  PaymentDetail::with('user_info')->get();

        return view('admin.payment.rafa_list', compact('user'));
    }

    public function rafa_confirm($id)
    {
        $update = PaymentDetail::where('id', $id)->first();

        if ($update) {
            $update->update([
                'c_status' => 1
            ]);
            $data = StudentLevel::where('user_id', $update->user_id)->first();
            if ($data) {
                $data->update([
                    'admin' => 'success'
                ]);
            } else {
                $student_level = new StudentLevel();
                $student_level->user_id = $update->user_id;
                $student_level->admin = 'success';
                $student_level->save();
            }
            return back();
        } else {
            return  back();
        }
    }

    public function rafa_reject($id)
    {
        $update = PaymentDetail::where('id', $id)->first();

        if ($update) {
            $update->update([
                'c_status' => 2
            ]);

            return back();
        } else {
            return  back();
        }
    }
}