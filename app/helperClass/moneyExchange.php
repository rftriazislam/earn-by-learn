<?php

namespace App\helperClass;

use App\Models\Course;
use App\Models\ExchangeRate;
use App\Models\PaymentDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class moneyExchange
{
    public static   function money_convert($currency, $price)
    {
        $currecny_user = $currency;

        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;

        $social = User::select('currency')->where('id', Auth::user()->id)->first();
        $currecny = $social->currency;
        $exchange = ExchangeRate::where('rates', $currecny)->first();
        $prc = $price_user * $exchange->money;

        $price_product =  round($prc) . ' ' .     $exchange->rates;
        return $price_product;
    }



    public static   function money_convert_2digit($currency, $price)
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



    public static   function count_course($course_name)
    {
        $course = Course::where('course', $course_name)->where('status', 1)->count();
        return  $course;
    }

    public static function batch($id)
    {
        if ($id == 1) {
            $user =  PaymentDetail::where('first_mentor_id', Auth::user()->id)->count();
        } else {
            $user =  PaymentDetail::where('second_mentor_id', Auth::user()->id)->count();
        }
        return $user;
    }
}