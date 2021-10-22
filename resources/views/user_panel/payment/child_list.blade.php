@extends('user_panel.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Of Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover -nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Student Name</th>
                                            <th>Phone</th>
                                            <th>Payment Method</th>
                                            <th>A/C Number</th>
                                            <th>Amount</th>
                                            <th>Picture</th <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $item->user_id }}</td>
                                                <td>{{ $item->user_info->name }}</td>
                                                <td>{{ $item->user_info->phone }}</td>
                                                <td>{{ $item->second_method_name }}</td>
                                                <td>{{ $item->second_account_number }}</td>

                                                <td>$5</td>

                                                <td>
                                                    <a
                                                        href="{{ asset('public/storage/mentor_2') }}/{{ $item->second_upload_screenshort }} }}"><img
                                                            src="{{ asset('public/storage/mentor_2') }}/{{ $item->second_upload_screenshort }}"
                                                            style="height: 50px;width:60px"> </a>
                                                </td>
                                                <td>
                                                    @if ($item->m2_status == 1)
                                                        <a class="btn btn-success btn-sm" style="color:white">Got Money
                                                        </a>
                                                    @else
                                                        <a class="btn btn-danger btn-sm" style="color:white">Did Not
                                                            Get Money</a>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($item->m2_status == 1)
                                                        <a class="btn btn-info btn-sm" style="color:white">Confirmed</a>

                                                    @elseif($item->m2_status == 2)
                                                        <a class="btn btn-danger btn-sm " style="color:white">Rejected</a>
                                                    @else
                                                        <a class="btn btn-primary btn-sm" style="color:white"
                                                            href="{{ route('child.confirm', [$item->id]) }}">Confirm</a>

                                                        <a class="btn btn-danger btn-sm "
                                                            href="{{ route('child.reject', [$item->id]) }}"
                                                            style="color:white">Decline</a>
                                                    @endif


                                                </td>
                                            </tr>

                                        @endforeach



                                    </tbody>

                                </table>
                            </div>



                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.card-body -->
            </div>
        </section> <!-- /.card -->
    </div>



@endsection
