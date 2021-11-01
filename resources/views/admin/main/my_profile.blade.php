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
                                        <img class="profile-user-img img-fluid img-circle" src="#"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Super Admin</h3>
                                    <p class="text-muted text-center">Admin Manager</p>


                                    <a href="#" class="btn btn-primary btn-block"><b>Logout</b></a>
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
                                <!-- <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                      <span class="tag tag-danger">UI Design</span>
                      <span class="tag tag-success">Coding</span>
                      <span class="tag tag-info">Javascript</span>
                      <span class="tag tag-warning">PHP</span>
                      <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                  </div> -->
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
                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputName" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email" value=""
                                                            id="inputEmail" placeholder="">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="password"
                                                            id="inputSkills" placeholder="Create New Or Old Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image" value="" placeholder="file">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="name" value=""
                                                            id="inputNumber" placeholder="phonenumber">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">WhatsApp</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputName" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Telegram</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputName" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Facebook
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputName" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Instagram
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputlink" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" value=""
                                                            id="inputName" placeholder="">
                                                        <input type="hidden" class="form-control" name="admin_id" value=""
                                                            id="inputName">
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
