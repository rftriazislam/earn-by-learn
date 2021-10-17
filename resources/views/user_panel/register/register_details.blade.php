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
                    <h1 class="text-center">Active Your Account</h1>
                    <div class="card">

                        <div class="card-body">

                            <p>You have to purchase course Digital Marketing & Freclancing course fee : $ 25 Online Lecture
                                + 2 Mentors</p>
                            <ul>
                                <li>Step-01: Send $ 10 [Video Lecture]</li>
                                <li>Step-02: Send $ 10 [Mentor-01]</li>
                                <li>Step-03: Send $ 5 [Mentor-02]</li>
                                <li>Step-04: Complete Your profile</li>
                            </ul>
                            <form action="{{ route('register.next') }}" method="post" class="php-email-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <div class="col-md-6 ">
                                        <input class="form-check-input" required type="checkbox" name="condition_check"
                                            id="remember" style="height: 18px;" value="check">

                                        <label class="form-check-label" for="remember">
                                            I agree with Terms & Conditions.
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="get-started-btn"> Next Step</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
