@extends('user_panel.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Admin</h3>

                                    <a href="{{ route('logout') }}" class="btn btn-primary btn-block"><b>Logout</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Phone</strong>

                                    <p class="text-muted">
                                        {{ Auth::user()->phone }}
                                    </p>

                                    <hr>
                                    <strong><i class="fas fa-book mr-1"></i> Currency</strong>

                                    <p class="text-muted">
                                        {{ Auth::user()->currency }}
                                    </p>

                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">{{ Auth::user()->address }}</p>

                                    <hr>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings "
                                                data-toggle="tab">Settings</a></li>

                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ Auth::user()->name }}" id="inputName"
                                                            placeholder="">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" disabled name="email"
                                                            value="{{ Auth::user()->email }}" id="inputEmail"
                                                            placeholder="">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="passwordd"
                                                            id="inputSkills" placeholder="Create New Or Old Password">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="file" value="" placeholder="file">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a
                                                            href="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}">
                                                            <img src="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}"
                                                                style="height:50px;60px;">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="phone"
                                                            value="{{ Auth::user()->phone }}" id="inputNumber"
                                                            placeholder="phonenumber">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address"
                                                            value="{{ Auth::user()->address }}" id="inputName"
                                                            placeholder="">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">updated</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- /.content-wrapper -->

@endsection
