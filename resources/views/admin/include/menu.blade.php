<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('back_end/dist/img/user2-160x160.jpg') }}" alt="Super Admin"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Earn BY Learn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('back_end/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            My Profile
                        </p>
                    </a>

                </li>


                <li class="nav-item has-treeview ">
                    <a href="{{ route('payment_method') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Setup Payment Method
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user nav-icon"></i>
                        <p>
                            All Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('rafa.payment') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment student</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-book nav-icon"></i>
                        <p>
                            Course
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_course') }}" class="nav-link ">
                                <i class="fas fa-book nav-icon"></i>
                                <p>
                                    Add Course
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="fas fa-book nav-icon"></i>
                                <p>
                                    Course List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview ">
                    <a href="{{ route('logout') }}" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            logout
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('moneyexchange') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Current Exchange Rate
                        </p>
                    </a>

                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
