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
                    <h3 style="float: right">Total (4 video)</h3>

                </div>
                <div class="col-md-4">

                    <img src="{{ asset('front_end') }}/assets/img/course12.jpg" class="img-fluid" alt="...">
                    <h3 style="float: left">Dropshipping</h3>
                    <h3 style="float: right">Total (41 video)</h3>

                </div>
                <div class="col-md-4">
                    <img src="{{ asset('front_end') }}/assets/img/course13.jpg" class="img-fluid" alt="...">
                    <h3 style="float: left">Freelancing</h3>
                    <h3 style="float: right">Total (91 video)</h3>


                </div>
            </div>


    </div>
    </section>
    </div>
@endsection
