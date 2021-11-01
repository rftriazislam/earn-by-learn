@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">

            <div class="rodw">
                <div class="col-lg-12">
                    <h1 style="text-align: center;border-bottom:5px solid black;">Email Marketing </h1>
                </div>


                <section class="content">
                    <div class="condd">
                        <div class="row" style=" margin-right: 21px;margin-left: 8px;">




                            <div class="col-md-3">
                                <div class="card" style="background: white;">
                                    <div class="card-header" style="background: #007bff;">

                                        <h3 style=" padding-top: 7px;color:white">
                                            Lists Emails
                                        </h3>

                                    </div>
                                    <a href="{{ url('email-marketing') }}" class="btn "
                                        style="color:white;width:100%;text-align: center;height:50px;font-size:14;margin-bottom: 2px;background:#a11dc2">Pending
                                        List ({{ $p }})
                                    </a>
                                    <a href="{{ url('accept-email-marketing') }}" class="btn btn-success"
                                        style="color:white;width:100%;text-align: center;height:50px;font-size:14;margin-bottom: 2px;">Accept
                                        List ({{ $a }})
                                    </a>
                                    <a href="{{ url('reject-email-marketing') }} " class="btn "
                                        style="color:white;width:100%;text-align: center;height:50px;font-size:14;background:#dc352a">Reject
                                        List ({{ $r }})
                                    </a>
                                </div>
                            </div>



                            <!-- right column -->
                            <div class="col-md-9">



                                <div class="card" style="background: white;">
                                    <div class="card-header" style="background: #007bff;">
                                        <h2 style=" padding-top: 7px;color:white"> List
                                            Of
                                            Emails
                                        </h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="height:670px;overflow:auto;">
                                        @if (session('delete_message'))
                                            <p style="color:aqua;" class="text-center">
                                                {{ session('delete_message') }}
                                            </p>
                                        @endif
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>

                                                <tr>
                                                    <th style="background: #4c14c9;color: white;">Id</th>
                                                    <th style="background: #4c14c9;color: white;">Email</th>
                                                    <th style="background: #4c14c9;color: white;">Recovery Email</th>
                                                    <th style="background: #4c14c9;color: white;">Password</th>
                                                    <th style="background: #4c14c9;color: white;">Price</th>
                                                    <th style="background: #4c14c9;color: white;">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse($emails as $v_data)
                                                    <tr>

                                                        <td>{{ $v_data->id }}</td>
                                                        <td style="background: white;">
                                                            <p> {{ $v_data->email }}</p>
                                                        </td>
                                                        <td style="background: white;">
                                                            <p> {{ $v_data->recovery_email }}</p>
                                                        </td>
                                                        <td style="background: white;">
                                                            <p> {{ $v_data->password }}</p>
                                                        </td>
                                                        <td style="background: white;">
                                                            <p style="color:rgb(226, 11, 226)"> {{ $v_data->price }}</p>
                                                        </td>



                                                        @if ($v_data->status == 2)
                                                            <td style="text-align:center"><a href=" "
                                                                    style="color:white"><button
                                                                        class="btn btn-primary">Accept</button>
                                                                </a></td>
                                                        @elseif($v_data->status==3)
                                                            <td style="text-align:center"><a href=" "
                                                                    style="color:white"><button
                                                                        class="btn btn-danger">Reject</button>
                                                                </a></td>

                                                        @endif


                                                    </tr>

                                                @empty
                                                    <tr class='text-center' style="color:red">
                                                        <td colspan="12">No available data</td>
                                                    </tr>
                                                @endforelse



                                            </tbody>

                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{ $emails->links() }}
                                <!-- /.card -->

                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>

        </section>
    </div>



@endsection
