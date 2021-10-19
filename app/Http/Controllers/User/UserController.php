<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    public function    user_dashboard()
    {
        return view('user_panel.main.home');
    }


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

        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            if ($very->status == 3) {
                return redirect()->route('user.dashboard');
            } else {
                return view('user_panel.register.verify', compact('very'));
            }
        } else {
            return view('user_panel.register.create', compact('user'));
        }
        // echo $user->mentor->mentor_payment;
        // exit();

    }

    public function register_final_create(Request $request)
    {

        // dd($request->all());

        $validate =  $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'first_mentor_id' => 'required|exists:users,id',
            'second_mentor_id' => 'required|exists:users,id',
            'method_name' => 'required|exists:payment_methods,method_name',
            'first_method_name' => 'required|exists:payment_methods,method_name',
            'second_method_name' => 'required|exists:payment_methods,method_name',
            'account_number' => 'required|exists:payment_methods,account_number',
            'first_account_number' => 'required|exists:payment_methods,account_number',
            'second_account_number' => 'required|exists:payment_methods,account_number',
            'upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            'first_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            'second_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('upload_screenshort')) {
            $image = $request->file('upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/upload/');
            // dd($destinationPath);
            $image->move($destinationPath, $imagename);
            $validate['upload_screenshort'] = $imagename;
        }

        if ($request->hasFile('first_upload_screenshort')) {
            $image = $request->file('first_upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/mentor_1/');
            // dd($destinationPath);
            $image->move($destinationPath, $imagename);
            $validate['first_upload_screenshort'] = $imagename;
        }
        if ($request->hasFile('second_upload_screenshort')) {
            $image = $request->file('second_upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/mentor_2/');
            // dd($destinationPath);
            $image->move($destinationPath, $imagename);
            $validate['second_upload_screenshort'] = $imagename;
        }

        $complete = PaymentDetail::create($validate);
        if ($complete) {

            return redirect()->route('register.final');
        } else {
            return  back();
        }
    }



    public function register_final_check()
    {

        $user = User::with(['mentor' => function ($q) {
            $q->select('id', 'refered_id')->with('mentor_payment:id,user_id,method_name')->with(['mentor' => function ($q) {
                $q->select('id', 'refered_id')->with(['mentor_payment:id,user_id,method_name']);
            }]);
        }])->where('id', Auth::user()->id)->first();

        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();

        return view('user_panel.register.check', compact('user', 'very'));
    }
    public function register_final_update(Request $request)
    {

        $update = PaymentDetail::where('user_id', Auth::user()->id)->first();

        $validate =  $this->validate($request, [
            'method_name' => 'nullable|exists:payment_methods,method_name',
            'first_method_name' => 'nullable|exists:payment_methods,method_name',
            'second_method_name' => 'nullable|exists:payment_methods,method_name',
            'account_number' => 'nullable|exists:payment_methods,account_number',
            'first_account_number' => 'nullable|exists:payment_methods,account_number',
            'second_account_number' => 'nullable|exists:payment_methods,account_number',
        ]);
        $update->update($validate);
        if ($request->hasFile('upload_screenshort')) {
            $validate =  $this->validate($request, [
                'upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $image = $request->file('upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/upload/');
            $image->move($destinationPath, $imagename);
            $validate['upload_screenshort'] = $imagename;
            $update->update([
                'upload_screenshort' => $imagename,
                'c_status' => 0,
            ]);
        }
        if ($request->hasFile('first_upload_screenshort')) {
            $validate =  $this->validate($request, [
                'first_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $image = $request->file('first_upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/mentor_1/');
            $image->move($destinationPath, $imagename);
            $validate['first_upload_screenshort'] = $imagename;
            $update->update([
                'first_upload_screenshort' => $imagename,
                'm1_status' => 0,
            ]);
        }
        if ($request->hasFile('second_upload_screenshort')) {
            $validate =  $this->validate($request, [
                'second_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $image = $request->file('second_upload_screenshort');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/mentor_2/');
            $image->move($destinationPath, $imagename);
            $validate['second_upload_screenshort'] = $imagename;
            $update->update([
                'second_upload_screenshort' => $imagename,
                'm2_status' => 0,
            ]);
        }

        return redirect()->route('register.final');
    }
}