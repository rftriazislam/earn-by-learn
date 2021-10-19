@php
$payment_name = App\Models\MethodName::where('status', 1)->get();
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
                    <h1 class="text-center">Update you Profile</h1>
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
                            <form action="{{ route('register.save.update') }}" method="post" class="php-email-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <input id="image" type="file"
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                value="{{ old('image') }}" required autocomplete="image" autofocus
                                                placeholder="Your image">

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <textarea class="form-control" name="address"
                                                placeholder="Your address"></textarea>

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <h4>Payment Method</h4>
                                    <div class="form-group ">

                                        <div class="col-md-6">
                                            <select name="method_name" id="step_3"
                                                class="form-control @error('country') is-invalid @enderror" required>
                                                <option disabled selected value=''>Payment Method</option>

                                                @foreach ($payment_name as $item)
                                                    <option value="{{ $item->method_name }}">
                                                        {{ $item->method_name }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <input id="number" type="text" class="form-control" name="account_number"
                                                autocomplete="number" autofocus required placeholder="Your A/C number">
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        {{-- <a href="{{ route('user') }}" class="get-started-btn"> Skip</a> --}}

                                        <button type="submit" style="background: rebeccapurple"
                                            class="get-started-btn">Update</button>

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
