@extends('user_panel.master')
@section('content')

    <div class="content-wrapper">
        <br>

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
                                        src="{{ asset('public/storage/profile') }}/{{ $user->user_info->image }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->user_info->name }}</h3>





                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Unique Id</b> <a class="float-right">{{ $user->user_id }}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Contact</b> <a class="float-right">{{ $user->user_info->phone }}</a>
                                    </li>




                                </ul>

                                <a class="btn btn-success btn-block" style="color:white"><b>Active</b></a>


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

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                                <p class="text-muted">{{ $user->user_info->address }}</p>


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
                                    <li class="nav-item"><a class="nav-link active" href="#timeline"
                                            data-toggle="tab">Mentor-02</a></li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="timeline">
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item" style="width:60%">
                                                <b>Country</b> <a
                                                    class="float-right">{{ $user->user_info->country }}</a>
                                            </li>
                                            <li class="list-group-item" style="width:60%">
                                                <b>Code</b> <a
                                                    class="float-right">{{ $user->user_info->country_code }}</a>
                                            </li>
                                            <li class="list-group-item" style="width:60%">
                                                <b>State</b> <a class="float-right">{{ $user->user_info->state }}</a>
                                            </li>
                                            <li class="list-group-item" style="width:60%">
                                                <b>Email</b> <a class="float-right">{{ $user->user_info->email }}</a>
                                            </li>
                                            <li class="list-group-item" style="width:60%">
                                                <b>Phone</b> <a class="float-right">{{ $user->user_info->phone }}</a>
                                            </li>
                                            <li class="list-group-item" style="width:60%">
                                                <b>Address</b> <a
                                                    class="float-right">{{ $user->user_info->address }}</a>
                                            </li>



                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->


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

@endsection
