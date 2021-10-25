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


                        <form action="{{ route('save_method') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="inputClientCompany">Method Name </label>
                                    <input type="text" name="method_name" class="form-control" required
                                        placeholder="Paypal">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payment Method List Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover -nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>

                                        <th>Method Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>#{{ $item->id }}</td>
                                            <td>{{ $item->method_name }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a class="btn btn-success btn-sm" style="color:white"> Active
                                                    </a>

                                                @else
                                                    <a class="btn btn-danger btn-sm" style="color:white"> OFF
                                                    </a>

                                                @endif


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>


    </div>
    </section>
    </div>
    <!-- /.content-wrapper -->



@endsection