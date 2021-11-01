@php
$payment_name = App\Models\MethodName::where('status', 1)->get();
@endphp

@extends('user_panel.master')
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


                        <form action="{{ route('save.payment.method') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select class="form-control" name="method_name">

                                        @foreach ($payment_name as $item)
                                            <option value="{{ $item->method_name }}">
                                                {{ $item->method_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">A/C Name</label>
                                    <input type="text" name="account_name" class="form-control" required
                                        placeholder="Nafiz Khan">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">A/C Number</label>
                                    <input type="text" name="account_number" class="form-control" required
                                        placeholder="+000000000">
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
                            <h3 class="card-title">Payment List Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover -nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>method Name</th>
                                        <th>A/C</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($PaymentMethod as $item)
                                        <tr>
                                            <td>#{{ $loop->iteration }}</td>
                                            <td>{{ $item->method_name }}</td>
                                            <td>{{ $item->account_number }}</td>
                                            <td>{{ $item->account_name }}</td>

                                            <td>
                                                @if ($item->status == 1)
                                                    <a href="{{ route('payment.method.status', [$item->id]) }}"
                                                        class="btn btn-success btn-sm" style="color:white"> Active
                                                    </a>

                                                @else
                                                    <a href="{{ route('payment.method.status', [$item->id]) }}"
                                                        class="btn btn-danger btn-sm" style="color:white"> OFF
                                                    </a>

                                                @endif


                                            </td>
                                            <td><a href="{{ route('payment.method.delete', [$item->id]) }}"
                                                    class="btn btn-danger btn-sm" style="color:white"> Delete
                                                </a></td>
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
