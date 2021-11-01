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
                    <h1 class="text-center">Payment With Paypal</h1>
                    <div class="card">

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
                            <form action="{{ route('paypal') }}" method="post" class="php-email-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <h3> Payment $10</h3>
                                        </div>
                                    </div>



                                    <div class="text-center">


                                        <button type="submit" style="background: rebeccapurple"
                                            class="get-started-btn">Pay</button>

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
