@extends('user_panel.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->


        <section class="content">


            <div class="row">


                <!-- /.card -->
                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Digital']) }}">
                        <img src="{{ asset('front_end') }}/assets/img/course11.jpg" class="img-fluid" alt="..."></a>
                    <h6 style="float: left"><b>Digital marketing | social media marketing</b></h6>
                    <h6 style="float: right">Total (<b>{{ Helper::count_course('Digital') }}</b>)</h6>
                    <div style="height:20px">

                    </div>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Outsourcing']) }}">

                        <img src="{{ asset('front_end') }}/assets/img/course12.jpg" class="img-fluid" alt="..."></a>
                    <h6 style="float: left"><b>Dropshipping</b></h6>
                    <h6 style="float: right">Total (<b>{{ Helper::count_course('Outsourcing') }}</b>)</h6>

                </div>
                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Freelancing']) }}">

                        <img src="{{ asset('front_end') }}/assets/img/course13.jpg" class="img-fluid" alt="..."></a>
                    <h6 style="float: left"><b>Freelancing</b></h6>
                    <h6 style="float: right">Total (<b>{{ Helper::count_course('Freelancing') }}</b>)</h6>


                </div>

                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Mastering IELTS Writing']) }}">

                        <img src="{{ asset('front_end') }}/assets/img/course14.jpg" class="img-fluid" alt="..."></a>
                    <h6 style="float: left"><b>Mastering IELTS Writing</b></h6>
                    <h6 style="float: right">Total (<b>{{ Helper::count_course('Mastering IELTS Writing') }}</b>)</h6>


                </div>
                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Become Shopify Expert']) }}">

                        <img src="{{ asset('public/front_end') }}/assets/img/course15.jpg" class="img-fluid"
                            alt="..."></a>
                    <h6 style="float: left">Become Shopify Expert</h6>
                    <h6 style="float: right">Total ({{ Helper::count_course('Become Shopify Expert') }})</h6>


                </div>
                <div class="col-md-3">
                    <a href="{{ route('course.single.view', ['Create Wordpres Website']) }}">

                        <img src="{{ asset('public/front_end') }}/assets/img/course16.jpg" class="img-fluid"
                            alt="..."></a>
                    <h6 style="float: left">Create Wordpres Website</h6>
                    <h6 style="float: right">Total ({{ Helper::count_course('Create Wordpres Website') }} video)</h6>


                </div>
            </div>


    </div>
    </section>
    </div>
@endsection
