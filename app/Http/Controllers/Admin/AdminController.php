<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ExchangeRate;
use App\Models\MethodName;
use App\Models\PaymentDetail;
use App\Models\StudentLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

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
            if ($update->c_status == 1 && $update->m1_status == 1 && $update->m2_status == 1) {
                $update->update([
                    'status' => 2
                ]);
                $user = User::where('id', Auth::user()->id)->first();
                $user->update([
                    'status' => 1
                ]);
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


    public function currency_convert_upload()
    {

        $data = Http::get('https://openexchangerates.org/api/latest.json?app_id=1d198fa2354940eca5d4bb7a85983404')->json();
        $base = $data['base'];
        $rates =   $data['rates'];
        $rat =    count($rates);

        $exchange = ExchangeRate::all();

        $i = 0;
        if ($exchange == '[]' || $exchange == null) {
            foreach ($rates as $key => $value) {
                if ($rat >= $i) {
                    $rates = new ExchangeRate();
                    $rates->base = $base;
                    $rates->rates = $key;
                    $rates->money = $value;
                    $rates->save();
                    $i = $i + 1;
                }
            }
        } else {

            foreach ($rates as $key => $value) {
                if ($rat >= $i) {
                    $rates = ExchangeRate::where('rates', $key)->first();

                    $rates->update([
                        $rates->money = $value,
                    ]);


                    $i = $i + 1;
                }
            }
        }
        return back();
    }
    public function payment_method()
    {
        $data = MethodName::paginate(10);
        return view('admin.payment.create', compact('data'));
    }


    public function save_method(Request $request)
    {
        $validate = $this->validate($request, [
            'method_name' => 'required|unique:method_names,method_name'
        ]);

        $create = MethodName::create($validate);
        if ($create) {
            return back();
        } else {
            return back();
        }
    }

    public function add_course()
    {
        $data = Course::paginate(10);
        return view('admin.course.create', compact('data'));
    }
    public function save_course(Request $request)
    {
        $validate = $this->validate($request, [
            'course' => 'required',
            'lecture' => 'required',
            'section' => 'required',
            'file' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
        ]);


        if ($request->hasFile('file')) {
            $video = $request->file('file');
            $dimensions = $video->getClientOriginalExtension();

            $videoname = time() . uniqid() . '.' . $dimensions;
            $destinationPath = public_path('/storage/course/');
            $video->move($destinationPath, $videoname);
            $validate['file'] =   $videoname;
        }


        $create = Course::create($validate);
        if ($create) {
            return back();
        } else {
            return back();
        }
    }
}