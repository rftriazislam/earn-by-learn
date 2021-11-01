@php
$payment = App\Models\PaymentMethod::where('role', 'admin')->get();
@endphp




@extends('frontend.master')

@section('head')

@endsection



@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">
                    <h1 class="text-center">Payment Step 1</h1>
                    <div class="card" style="border: 0;">

                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="custom-alerts alert alert-success fade in">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    {!! $message !!}
                                </div>
                                <?php Session::forget('success'); ?>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="custom-alerts alert alert-danger fade in">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    {!! $message !!}
                                </div>
                                <?php Session::forget('error'); ?>
                            @endif

                            <div class="row">
                                <div>
                                    <div class="text-center col-5"
                                        style="float: left;border: 3px solid #5fcf80; margin-left:2%;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <a href="{{ route('giftcard') }}">
                                            <img src="{{ asset('front_end') }}/assets/img/gf2.jpg" alt=""
                                                class="img-fluid">

                                        </a>
                                    </div>
                                    <div class="text-center col-5 "
                                        style="float: left;border: 3px solid #5fcf80; margin-left:2%;   margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <a href="{{ route('paywithpaypal') }}"> <img
                                                src="{{ asset('front_end') }}/assets/img/paypal2.jpg" alt=""
                                                class="img-fluid">
                                        </a>
                                    </div>

                                </div>
                                <div style=" col-10 margin-left:2%;margin-top:5%">

                                    <p>1. If you use giftcard , firstly you can buy giftcard .</p>
                                    <p>2. Then, you will get a number to use it.</p>
                                    <p>3. If you use paypal , give valid paypal account information</p>
                                    <p>4. If you do not complete payment your account will be removed after 72 hours.</p>



                                </div>

                                {{-- <div class="footer-newsletter">


                                    <form action="{{ route('register.final.create') }}" method="post"
                                        class="php-email-form" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <input id="refered_id" type="number" class="form-control " required
                                                    autocomplete="name" autofocus placeholder="Gift card ID">

                                                @error('refered_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="text-center">

                                            <button type="submit" style="background: rebeccapurple"
                                                class="get-started-btn">Confirm</button>
                                        </div>
                                    </form>

                                </div> --}}

                            </div>






                        </div>
                    </div>
                </div>
                {{-- <div style="height: 100px"></div> --}}
            </div>

        </div>
        </div>
    </section>



@endsection

{{-- @section('js')
    <script src="{{ asset('front_end/country/js/country_list/country.js') }}"></script>
    <script>
        $('#step_1').on('change', function() {
            var step_1 = $("#step_1 option:selected").val();
            console.log(step_1);
            get('step_1', '', step_1)
        });


        function get(step, id = null, method_name) {

            var step = step;
            var user_id = id;
            var method_name = method_name;
            $.ajax({
                url: '{{ route('payment.method') }}',
                type: 'get',
                data: {
                    "step": step,
                    "user_id": user_id,
                    "method_name": method_name,
                },
                dataType: 'json',
                success: function(data) {

                    if (data.step == 'step_1') {
                        $('#data-step-1').html(data.output);
                    } else if (data.step == 'step_2') {
                        $('#data-step-2').html(data.output);
                    } else if (data.step == 'step_3') {
                        $('#data-step-3').html(data.output);
                    }


                }
            });
        }
    </script>


@endsection --}}
