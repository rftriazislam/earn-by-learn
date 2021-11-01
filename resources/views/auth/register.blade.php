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
                    <h1 class="text-center">Register</h1>
                    <div class="card">

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

                                    <div class="form-group mt-3 mt-md-0">

                                        <div class="col-md-12">
                                            <select id="country" name="country_code"
                                                class="form-control @error('country') is-invalid @enderror"
                                                value="{{ old('country_code') }}" required autocomplete="country"
                                                autofocus type="text" placeholder="country">
                                                <option>Select Country</option>
                                            </select>


                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12">

                                            <select id="state" name="state"
                                                class="form-control @error('state') is-invalid @enderror"
                                                value="{{ old('state') }}" required autocomplete="country" autofocus
                                                type="text" placeholder="country">
                                                <option>Select State/Division</option>
                                            </select>

                                            <div id="country_3">
                                            </div>
                                            <div id="country_4">
                                            </div>
                                            <div id="country_5">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="Your Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                                placeholder="Your Phone Number">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group  mt-3 mt-md-0">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Your Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class=" form-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Your Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group ">


                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Password Confirm">
                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <input id="refered_id" type="number" class="form-control " required
                                                autocomplete="name" autofocus placeholder="Affiliate ID">

                                            @error('refered_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12" id="open">

                                        </div>
                                    </div>




                                    <div class="text-center">
                                        <a href="{{ route('login') }}" class="get-started-btn"> Login</a>

                                        <button type="submit" style="background: rebeccapurple"
                                            class="get-started-btn">Register</button>

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
        $('#refered_id').keyup('change', function() {
            var id = $("#refered_id").val();

            if (id) {
                // console.log(id)
                get(id)
            } else {
                console.log('null')
            }

        });

        function get(id) {


            var user_id = id;

            $.ajax({
                url: '{{ route('check.referral') }}',
                type: 'get',
                data: {
                    "user_id": user_id
                },
                dataType: 'json',
                success: function(data) {

                    if (data.message == true) {
                        $('#open').html(data.output);
                    } else {
                        $('#open').html(data.output);
                    }



                }
            });
        }
    </script>
@endsection
