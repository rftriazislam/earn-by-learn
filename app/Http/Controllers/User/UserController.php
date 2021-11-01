<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CardNumber;
use App\Models\Course;
use App\Models\EmailMarketing;
use App\Models\ExchangeRate;
use App\Models\MethodName;
use App\Models\PaymentDetail;
use App\Models\PaymentMethod;
use App\Models\StudentLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Validation\Rule;
use PDOException;

class UserController extends Controller
{

    public function money_convert($currency, $price)
    {
        $currecny_user = $currency;

        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;

        $social = User::select('currency')->where('id', Auth::user()->id)->first();
        $currecny = $social->currency;
        $exchange = ExchangeRate::where('rates', $currecny)->first();
        $prc = $price_user * $exchange->money;

        $price_product =  round($prc, 2) . ' ' .     $exchange->rates;
        return $price_product;
    }

    protected function check()
    {
        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            if ($very->status == 3) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function    user_dashboard()
    {
        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            if ($very->status == 3) {
                return view('user_panel.main.home');
            } else {
                return redirect()->route('register.final');
            }
        } else {
            return redirect()->route('login');
        }
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

            if ($very->status == 1) {
                return view('user_panel.register.create', compact('user'));
            } else if ($very->status == 2) {
                // return redirect()->route('user.dashboard');
                return redirect()->route('register.profile.update');
            } elseif ($very->status == 3) {
                return redirect()->route('user.dashboard');
            } elseif ($very->status == 0) {
                return view('user_panel.register.admin_payment', compact('user'));
            } else {
                return view('user_panel.register.verify', compact('very'));
            }
            // 

        } else {

            return view('user_panel.register.admin_payment', compact('user'));
        }
        // echo $user->mentor->mentor_payment;
        // exit();

    }

    public function payment_page()
    {
        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            if ($very->status == 0) {
                return redirect()->route('register.final');
            } else {
                return redirect()->route('register.final');
            }
        } else {
            return view('user_panel.register.payment');
        }
    }

    public function payment_giftcard()
    {
        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            if ($very->status == 0) {
                return view('user_panel.register.giftcard');
            } else {
                return redirect()->route('register.final');
            }
        } else {
            return view('user_panel.register.giftcard');
        }
    }



    public function register_final_create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'number' => [
                'required', Rule::exists('card_numbers', 'number', 'status')
                    ->where('status', 0)
                    ->where('number', $request->number)

            ]
        ]);

        $complete = new  PaymentDetail();
        $complete->user_id = Auth::user()->id;
        $complete->method_name = 'Giftcard';
        $complete->account_number = $request->number;
        $complete->upload_screenshort = '----';
        $complete->c_status = 1;
        if ($complete->save()) {
            $card = CardNumber::where('number', $request->number)->first();
            $card->update([
                'status' => 1,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('register.final');
        } else {
            return  back();
        }
    }



    public function register_final_update_create(Request $request)
    {

        // dd($request->all());

        $request['user_id'] = Auth::user()->id;
        $validate =  $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'first_mentor_id' => 'required|exists:users,id',
            'second_mentor_id' => 'required|exists:users,id',
            'first_method_name' => 'required|exists:payment_methods,method_name',
            'second_method_name' => 'required|exists:payment_methods,method_name',
            'first_account_number' => 'required|exists:payment_methods,account_number',
            'second_account_number' => 'required|exists:payment_methods,account_number',
            'first_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
            'second_upload_screenshort' => 'required|image|mimes:jpg,png,jpeg',
        ]);

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

        $validate['status'] = 4;
        $very = PaymentDetail::where('user_id', Auth::user()->id)->first();
        if ($very) {
            $very->update($validate);
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
        if ($very->status == 3) {
            return redirect()->route('register.final');
        } else {
            return view('user_panel.register.check', compact('user', 'very'));
        }
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

    public function register_profile_update()
    {
        $PaymentMethod = PaymentMethod::where('user_id', Auth::user()->id)->first();
        if ($PaymentMethod) {
            return redirect()->route('user.dashboard');
        } else {
            return view('user_panel.register.profile_update');
        }
    }

    public function register_save_update(Request $request)
    {
        $validate =  $this->validate($request, [
            'method_name' => 'required',
            'account_number' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'address' => 'required',
        ]);


        $update = User::where('id', Auth::user()->id)->first();

        $update->update([
            'address' => $request->address
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename =  Auth::user()->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/profile/');
            $image->move($destinationPath, $imagename);
            $update->update([
                'image' => $imagename,
            ]);
        }

        $method = new PaymentMethod();
        $method->user_id = Auth::user()->id;
        $method->method_name = $request->method_name;
        $method->account_number = $request->account_number;
        $method->account_name = $request->method_name;

        if ($method->save()) {
            $update = PaymentDetail::where('user_id', Auth::user()->id)->first();
            $update->update(['status' => 3]);
            return redirect()->route('user.dashboard');
        } else {
            return back();
        }
    }
    public function user_profile_update(Request $request)
    {
        $update = User::where('id', Auth::user()->id)->first();

        if ($request->passwordd) {
            $request['password'] = $request->passwordd;
        }

        $update->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename =  Auth::user()->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/profile/');
            $image->move($destinationPath, $imagename);
            $update->update([
                'image' => $imagename,
            ]);
        }

        return back();
    }

    public function parent_payment()
    {
        $user =  PaymentDetail::with('user_info')->where('first_mentor_id', Auth::user()->id)->latest()->paginate(10);

        return view('user_panel.payment.parent_list', compact('user'));
    }

    public function parent_confirm($id)
    {
        $update = PaymentDetail::where('first_mentor_id', Auth::user()->id)->where('id', $id)->first();

        if ($update) {
            $update->update([
                'm1_status' => 1
            ]);
            $data = StudentLevel::where('user_id', $update->user_id)->first();
            if ($data) {
                $data->update([
                    'first_mentor_id' => Auth::user()->id
                ]);
            } else {
                $student_level = new StudentLevel();
                $student_level->user_id = $update->user_id;
                $student_level->first_mentor_id = Auth::user()->id;
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

    public function parent_reject($id)
    {
        $update = PaymentDetail::where('first_mentor_id', Auth::user()->id)->where('id', $id)->first();

        if ($update) {
            $update->update([
                'm1_status' => 2
            ]);

            return back();
        } else {
            return  back();
        }
    }



    public function child_payment()
    {
        $user =  PaymentDetail::with('user_info')->where('second_mentor_id', Auth::user()->id)->latest()->paginate(10);
        // dd($user);
        return view('user_panel.payment.child_list', compact('user'));
    }

    public function child_confirm($id)
    {
        $update = PaymentDetail::where('second_mentor_id', Auth::user()->id)->where('id', $id)->first();

        if ($update) {
            $update->update([
                'm2_status' => 1
            ]);
            $data = StudentLevel::where('user_id', $update->user_id)->first();
            if ($data) {
                $data->update([
                    'second_mentor_id' => Auth::user()->id
                ]);
            } else {
                $student_level = new StudentLevel();
                $student_level->user_id = $update->user_id;
                $student_level->second_mentor_id = Auth::user()->id;
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

    public function child_reject($id)
    {
        $update = PaymentDetail::where('second_mentor_id', Auth::user()->id)->where('id', $id)->first();

        if ($update) {
            $update->update([
                'm2_status' => 2
            ]);
            return back();
        } else {
            return  back();
        }
    }

    public function affiliate_link()
    {

        $v = url('/learn-ria-earn') . "-" . Auth::user()->id . "-world-by-" . Auth::user()->id;
        return view('user_panel.affiliate.affiliate', compact('v'));
    }


    public function user_course()
    {
        return view('user_panel.course.view');
    }

    public function course_single_view($id)
    {
        $course = Course::where('course', $id)->get();
        if (count($course) > 0) {
            $play = Course::where('course', $id)->first();
            return view('user_panel.course.single_view', compact('course', 'play'));
        } else {
            return back();
        }
    }

    public function course_play($id)
    {
        $play = Course::where('id', $id)->first();
        if ($play) {
            $course = Course::where('course', $play->course)->get();
            return view('user_panel.course.single_view', compact('course', 'play'));
        } else {
            return back();
        }
    }


    public function payment_method_add()
    {
        $PaymentMethod = PaymentMethod::where('user_id', Auth::user()->id)->get();
        return view('user_panel.payment.add_method', compact('PaymentMethod'));
    }
    public function save_payment_method(Request $request)
    {

        $this->validate($request, [
            'method_name' => [
                'required', Rule::unique('payment_methods')
                    ->where('user_id', Auth::user()->id)
                    ->where('method_name', $request->method_name)
            ]
        ]);

        $method = new PaymentMethod();
        $method->user_id = Auth::user()->id;
        $method->method_name = $request->method_name;
        $method->account_number = $request->account_number;
        $method->account_name = $request->account_name;

        if ($method->save()) {
            return   back();
        } else {
            return   back()->with('message', 'error');
        }
    }

    public function payment_method_delete($id)
    {
        PaymentMethod::where('id', $id)->delete();
        return   back();
    }

    public function payment_method_status($id)
    {
        $p = PaymentMethod::where('id', $id)->first();
        if ($p) {
            $p->update([
                'status' => ($p->status == 1) ? 0 : 1
            ]);
            return   back();
        } else {
            return   back()->with('message', 'error');
        }
    }
    public function profile_view()
    {
        return view('user_panel.main.my_profile');
    }
    public function email_marketing()
    {



        $data = EmailMarketing::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view(
            'user_panel.email.emailmarketing',
            compact('data')
        );
    }

    public function save_email(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $p =  $this->validate($request, [
            'user_id' => 'required',
            'email' => 'required|unique:email_marketings',
            'password' => 'required',
            'recovery_email' => 'required',
        ]);



        try {
            $save = EmailMarketing::create($p);
            return back()->with('message', 'Succefully add');
        } catch (PDOException $e) {

            return back()->with('message', 'validate data missing ');
        }
    }

    public function default()
    {
        return view('user_panel.main.default');
    }




    public function parent_mentor()
    {

        $user =  PaymentDetail::with('user_info')->where('user_id', Auth::user()->refered_id)->first();

        return view('user_panel.payment.parent_mentor_list', compact('user'));
    }

    public function child_mentor()
    {
        $info =  PaymentDetail::with('user_info')->where('user_id', Auth::user()->refered_id)->first();
        $user = PaymentDetail::where('user_id',  $info->user_info->refered_id)->first();
        return view('user_panel.payment.child_mentor_list', compact('user'));
    }
}