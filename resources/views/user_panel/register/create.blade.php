@php
$payment = App\Models\PaymentMethod::where('user_id', 1)->get();
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('register') }}" method="post" class="php-email-form">
                                @csrf
                                <div class="row">
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 1 : Send $10 (800 BDT) Video Lecture </h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="country_code" id="step_1"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected>Payment Method</option>
                                                    @foreach ($payment as $item)
                                                        <option value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="number" type="text"
                                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                                    value="{{ old('number') }}" required autocomplete="number" autofocus
                                                    placeholder="Your number">

                                                @error('number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="phone" type="file"
                                                    class="form-control @error('phone') is-invalid @enderror" name="file"
                                                    value="{{ old('phone') }}" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 2 : Send $10 (800 BDT) Mentor-1 </h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="country_code" id="step_2"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected>Payment Method</option>

                                                    @foreach ($user->mentor->mentor_payment as $item)
                                                        <option value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="number" type="text"
                                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                                    value="{{ old('number') }}" required autocomplete="number" autofocus
                                                    placeholder="Your number">

                                                @error('number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="phone" type="file"
                                                    class="form-control @error('phone') is-invalid @enderror" name="file"
                                                    value="{{ old('phone') }}" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div
                                        style="border: 3px solid #5fcf80;    margin-bottom: 13px;border-radius: 16px;    padding: 13px;">
                                        <h4>Step 3 : Send $5 (400 BDT) Mentor-2</h4>
                                        <div class="form-group ">

                                            <div class="col-md-6">
                                                <select name="country_code" id="step_3"
                                                    class="form-control @error('country') is-invalid @enderror" required>
                                                    <option disabled selected>Payment Method</option>

                                                    @foreach ($user->mentor->mentor->mentor_payment as $item)
                                                        <option value="{{ $item->method_name }}">
                                                            {{ $item->method_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="number" type="text"
                                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                                    value="{{ old('number') }}" required autocomplete="number" autofocus
                                                    placeholder="Your number">

                                                @error('number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="col-md-12">
                                                <input id="phone" type="file"
                                                    class="form-control @error('phone') is-invalid @enderror" name="file"
                                                    value="{{ old('phone') }}" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

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
            console.log(selectedVal);
            get(step_1, 'step_1')
        });

        function get(id, data) {

            var user_id = id;
            var data = data;
            $.ajax({
                url: '{{ route('payment.method') }}',
                type: 'get',
                data: {
                    "user_id=" + user_id,
                    "data": data,
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data.output)
                    $('#all_patient_confirm_list').html(data.output);
                    $('#view_file_list').css('display', 'none');
                }
            });
        }
    </script>


@endsection
