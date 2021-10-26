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
                <div class="col-md-4">
                    <a href="{{ route('course.single.view', ['Digital']) }}">
                        <img src="{{ asset('front_end') }}/assets/img/course11.jpg" class="img-fluid" alt="..."></a>
                    <h3 style="float: left">Marketing</h3>
                    <h3 style="float: right">Total ({{ Helper::count_course('Digital') }} video)</h3>

                </div>
                <div class="col-md-4">
                    <a href="{{ route('course.single.view', ['Outsourcing']) }}">

                        <img src="{{ asset('front_end') }}/assets/img/course12.jpg" class="img-fluid" alt="..."></a>
                    <h3 style="float: left">Dropshipping</h3>
                    <h3 style="float: right">Total ({{ Helper::count_course('Outsourcing') }} video)</h3>

                </div>
                <div class="col-md-4">
                    <a href="{{ route('course.single.view', ['Freelancing']) }}">

                        <img src="{{ asset('front_end') }}/assets/img/course13.jpg" class="img-fluid" alt="..."></a>
                    <h3 style="float: left">Freelancing</h3>
                    <h3 style="float: right">Total ({{ Helper::count_course('Freelancing') }} video)</h3>


                </div>
            </div>


    </div>
    </section>
    </div>
@endsection
