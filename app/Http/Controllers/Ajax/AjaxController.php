<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\StudentLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AjaxController extends Controller
{



    public function payment_method(Request $request)
    {
        $step = $request->step;
        $screen_1 = ($step == 'step_1') ? 'name="upload_screenshort"' : (($step == 'step_2') ? 'name="first_upload_screenshort"' : 'name="second_upload_screenshort"');
        $number_1 = ($step == 'step_1') ? 'name="account_number"' : (($step == 'step_2') ? 'name="first_account_number"' : 'name="second_account_number"');

        if ($request->user_id == null) {
            $payment = PaymentMethod::where('role', 'admin')->where('method_name', $request->method_name)->first();
        } else {
            $payment = PaymentMethod::where('role', 'user')->where('user_id', $request->user_id)->where('method_name', $request->method_name)->first();
        }



        if ($payment) {
            $output = '<div class="form-group ">

    <div class="col-md-12">
        <input id="number" type="text"
            class="form-control"  value="A/C : ' . $payment->account_number . '" disabled   autocomplete="number" autofocus
            placeholder="Your number">
            <input id="number" type="hidden"
            class="form-control"  ' . $number_1 . ' value="' . $payment->account_number . '"    autocomplete="number" autofocus
            placeholder="Your number">
    </div>
</div>
<div class="form-group ">

    <div class="col-md-12">
  
        <input id="phone" type="file"
            class="form-control "  ' . $screen_1 . ' 
             required>
             <label style="color:red" > Note : Payment Screenshort (Image) must be valid for ' . $payment->method_name . '</label>
             <br>

    </div>
</div>';
            $data = array(
                'step' => $step,
                'output'  => $output,
                'message'  => 'true'
            );
        } else {
            $data = array(
                'step' => $step,
                'output'  => null,
                'message'  => 'true'
            );
        }




        echo json_encode($data);
    }


    public function referral(Request $request)
    {
        $id = $request->user_id;
        $num = is_numeric($id);
        if ($num == true) {
            $id = $id;
            $use =   User::with('student_level')->where('id', $id)->first();

            if (empty($use->student_level)) {

                $output = '<h4 style="color:red">Invalid Referral ID</h4>';
                $mes = false;
            } else {
                $check = StudentLevel::where('first_mentor_id', $id)->count();
                if ($check < 10) {
                    $output = '
                   <input type="hidden" name="refered_id"  value="' . $id . '"  required
                    autocomplete="name" autofocus placeholder="Refered ID">';
                    $mes = true;
                } else {
                    $output = '<h4 style="color:red">Use another referral ID</h4>';
                    $mes = false;
                }
            }
        } else {
            $output = '<h4 style="color:red">Invalid referral ID</h4>';
            $mes = false;
        }



        $data = array(
            'output'  => $output,
            'message'  => $mes
        );
        echo json_encode($data);
    }
}