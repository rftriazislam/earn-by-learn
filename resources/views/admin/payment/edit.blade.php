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


                        <form action="{{ route('update_method') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="inputClientCompany">Update Method Name </label>
                                    <input type="text" name="method_name" class="form-control"
                                        value="{{ $view->method_name }}" required placeholder="Paypal">
                                    <input type="hidden" name="id" value="{{ $view->id }}">
                                </div>



                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update </button>
                                    <a class="btn btn-danger" href="{{ route('payment_method') }}">
                                        Back</a>
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
                                                <a href="{{ route('method.edit', [$item->id]) }}"
                                                    class="btn btn-info btn-sm" style="color:white"> Edit/Update
                                                </a>

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
