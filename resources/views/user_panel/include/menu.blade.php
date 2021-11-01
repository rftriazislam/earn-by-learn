<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Earn BY Learn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}"
                    class="img-circle elevation-2" alt="User Image">
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


                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Become A Merchant
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Marketplace
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Digital MarketPlace
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Dropshipping
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">

                        <i class="fas fa-user nav-icon"></i>
                        <p>
                            My Mentors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('parent.mentor') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mentor-01</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('child.mentor') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mentor-02</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">

                        <i class="fas fa-user nav-icon"></i>
                        <p>
                            My Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('parent.payment') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch-01</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('child.payment') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch-02</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('user.course') }}" class="nav-link ">
                        <i class="fas fa-book nav-icon"></i>
                        <p>
                            Course
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="fas fa-book nav-icon"></i>
                        <p>
                            Theme & Plugins
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="fas fa-book nav-icon"></i>
                        <p>
                            Digital Content
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('profile.view') }}" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            My Profile
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('payment.method.add') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Payment Methods
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{ route('affiliate-link') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Affiliate Link
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('default') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Promotional Materials
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>

                </li>





                <li class="nav-item has-treeview ">
                    <a href="{{ route('email_marketing') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Freelancing
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('logout') }}" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            logout
                        </p>
                    </a>

                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
