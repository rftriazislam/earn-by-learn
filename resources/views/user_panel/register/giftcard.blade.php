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
                    <h1 class="text-center">Payment With GiftCard</h1>
                    <div class="cardd">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('payment.giftcard') }}" method="post" class="php-email-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="form-group ">

                                    <div class="col-md-12">

                                        <input id="number" type="number" class="form-control" name="number"
                                            autocomplete="number" autofocus required placeholder="gifcard number">
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
