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
                    <h1 class="text-center">Your Account verify processing </h1>
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <h4>------ Mentor 1 ------</h4>
                                <div class="form-group php-email-form">
                                    @if ($very->m1_status == 1)
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rgb(20, 29, 161);width:95%">Verified
                                            </button>
                                        </div>
                                    @elseif ($very->m1_status == 2)
                                        <div class="col-md-6" style="float: left">
                                            <button class="get-started-btn"
                                                style="background:rgb(250, 4, 4);width:95%">Mentor 1 Cancel</button>
                                        </div>

                                        <div class="col-md-6" style="float: left">
                                            <a href="{{ route('register.final.check') }}"> <button class="get-started-btn"
                                                    style="background:rgb(28, 168, 47);width:95%">Go
                                                    to Payment </button></a>
                                        </div>

                                    @else
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rebeccapurple;width:95%">Proccessing</button>
                                        </div>

                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <h4>------ Mentor 2 ------</h4>
                                <div class="form-group php-email-form">
                                    @if ($very->m2_status == 1)
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rgb(20, 29, 161);width:95%">Verified
                                            </button>
                                        </div>
                                    @elseif ($very->m2_status == 2)
                                        <div class="col-md-6" style="float: left">
                                            <button class="get-started-btn" style="background:rgb(250, 4, 4);width:95%">
                                                Mentor 2 Cancel</button>
                                        </div>

                                        <div class="col-md-6" style="float: left">
                                            <a href="{{ route('register.final.check') }}"> <button class="get-started-btn"
                                                    style="background:rgb(28, 168, 47);width:95%">Go
                                                    to Payment </button></a>
                                        </div>

                                    @else
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rebeccapurple;width:95%">Proccessing</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <h4>------ Admin ------</h4>
                                <div class="form-group php-email-form">
                                    @if ($very->c_status == 1)
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rgb(20, 29, 161);width:95%">Verified
                                            </button>
                                        </div>
                                    @elseif ($very->c_status == 2)
                                        <div class="col-md-6" style="float: left">
                                            <button class="get-started-btn"
                                                style="background:rgb(250, 4, 4);width:95%">Admin Cancel</button>
                                        </div>

                                        <div class="col-md-6" style="float: left">
                                            <a href="{{ route('register.final.check') }}"> <button class="get-started-btn"
                                                    style="background:rgb(28, 168, 47);width:95%">Go
                                                    to Payment </button></a>
                                        </div>

                                    @else
                                        <div class="col-md-12">
                                            <button class="get-started-btn"
                                                style="background:rebeccapurple;width:95%">Proccessing</button>
                                        </div>

                                    @endif
                                </div>
                            </div>




                            <br>
                            <br>


                            <div class="text-center php-email-form">
                                @if ($very->m1_status == 1 && $very->m2_status == 1 && $very->c_status == 1)
                                    <a href="{{ route('register.final') }}"><button type="submit"
                                            class="get-started-btn">Go Next </button></a>
                                @else
                                    <a href="{{ route('register.final') }}"><button type="submit" class="get-started-btn"
                                            style="background:rgb(250, 4, 4);">Wait For Checking</button></a>

                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
