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
                    <h1 class="text-center">Final Step </h1>
                    <div class="card" style="border: 0;">

                        <div class="card-body">

                            <form action="{{ route('register.final.create') }}" method="post" class="php-email-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 1 : Send $10 (800 BDT) Video Lecture </h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="method_name" id="step_1"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected value=''>Payment Method</option>
                                                    @foreach ($payment as $item)
                                                        <option value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach

                                                    <input name="user_id" value="{{ $user->id }}" type="hidden">
                                                </select>
                                            </div>
                                        </div>
                                        <div id="data-step-1"> </div>

                                    </div>
                                    <br>
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 2 : Send $10 (800 BDT) Mentor-1 </h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="first_method_name" id="step_2"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected value=''>Payment Method</option>

                                                    @foreach ($user->mentor->mentor_payment as $item)
                                                        <option tota_pakhi="{{ $user->refered_id }}"
                                                            value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach

                                                </select>
                                                <input name="first_mentor_id" value="{{ $user->refered_id }}"
                                                    type="hidden">
                                            </div>
                                        </div>
                                        <div id="data-step-2"> </div>
                                    </div>
                                    <br>
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 3 : Send $5 (400 BDT) Mentor-2</h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="second_method_name" id="step_3"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected value=''>Payment Method</option>

                                                    @foreach ($user->mentor->mentor->mentor_payment as $item)
                                                        <option tota_pakhi="{{ $user->mentor->refered_id }}"
                                                            value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach
                                                </select>

                                                <input name="second_mentor_id" value="{{ $user->refered_id }}"
                                                    type="hidden">
                                            </div>
                                        </div>

                                        <div id="data-step-3"> </div>
                                    </div>



                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="text-center">

                                        <button type="submit" style="background: rebeccapurple"
                                            class="get-started-btn">Confirm</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>



@endsection

@section('js')
    <script src="{{ asset('front_end/country/js/country_list/country.js') }}"></script>
    <script>
        $('#step_1').on('change', function() {
            var step_1 = $("#step_1 option:selected").val();
            console.log(step_1);
            get('step_1', '', step_1)
        });
        $('#step_2').on('change', function() {

            var step_1 = $("#step_2 option:selected").val();
            var user_id = $("#step_2 option:selected").attr("tota_pakhi");
            console.log(user_id);
            get('step_2', user_id, step_1)
        });
        $('#step_3').on('change', function() {
            var step_1 = $("#step_3 option:selected").val();
            var user_id = $("#step_3 option:selected").attr("tota_pakhi");
            console.log(user_id);
            get('step_3', user_id, step_1)
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


@endsection
