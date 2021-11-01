@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->


        <section class="content">


            <div class="row">

                <div class="col-md-4">
                    <div class="card card-primary">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{ route('card.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="inputClientCompany">Card Number</label>
                                    <input type="text" name="number" class="form-control" required
                                        value="{{ $number }}" placeholder="Name of video">
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save </button>
                                    <button type="reset" class="btn btn-default ">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Course List Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover -nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>

                                        <th>Card Number</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>

                                            <td>{{ $item->number }}</td>
                                            <td>----</td>
                                            <td>{{ $item->status == 0 ? 'Not Used' : 'Used' }}</td>
                                            <td>
                                                <a class="btn btn-danger" style="color:white"> Delete</a>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>


    </div>
    </section>
    </div>
    <!-- /.content-wrapper -->




@endsection
