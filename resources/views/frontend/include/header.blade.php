    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            {{-- <h1 class="logo me-auto"><a href="{{ route('home') }}"> Earn By Learn</a></h1> --}}

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo me-auto">
                <img src="{{ asset('front_end') }}/assets/img/text.png" alt="" class="img-fluid">
                {{-- Earn By Learn --}}
            </a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="active" href="{{ route('home') }}">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="trainers.html">Themes & Plugins</a></li>
                    <li><a href="events.html">Web & App</a></li>
                    <li><a href="pricing.html">Pricing</a></li>

                    <li class="dropdown"><a href="#"><span>More </span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Mentors</a></li>
                            <li class="dropdown"><a href="#"><span>Terms & Policy </span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>

                    @auth
                        <li><a href="{{ route('login') }}">Dashboard</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            @auth
                <a href="{{ route('logout') }}" class="get-started-btn" style="background: var(--bs-purple);">Logout</a>

            @else
                <a href="{{ route('login') }}" class="get-started-btn">Login</a>
            @endauth







        </div>
    </header><!-- End Header -->
