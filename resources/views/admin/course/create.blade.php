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


                        <form action="{{ route('save.course') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Course</label>
                                    <select class="form-control" name="course">
                                        {{-- <option value="Digital">Digital</option>
                                        <option value="Outsourcing">Outsourcing</option>
                                        <option value="Freelancing">Freelancing</option> --}}
                                        {{-- <option value="Mastering IELTS Writing">Mastering IELTS Writing</option> --}}

                                        <option value="Mastering IELTS Writing">Mastering IELTS Writing Task 2(Brand 7++ in
                                            5 hours)
                                        </option>

                                        {{-- <option value="Become Shopify Expert">Become Shopify Expert</option> --}}
                                        {{-- <option value="Create Wordpres Website">Create Wordpres Website</option> --}}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Section Name</label>
                                    <input type="text" name="section" class="form-control" required
                                        placeholder="Name of video">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Lecture Name</label>
                                    <input type="text" name="lecture" class="form-control" required
                                        placeholder="Name of video">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="inputClientCompany">Upload File MP4</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div> --}}

                                <div class="form-group">
                                    <label for="inputClientCompany">Image ID</label>
                                    <input type="text" name="file" class="form-control" required placeholder="image id">
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

                                        <th>Course</th>
                                        <th>Section</th>
                                        <th>Lecture</th>
                                        <th>image name</th>
                                        <th>Video/MP4</th>
                                        <th>Actions</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>#{{ $item->id }}</td>
                                            <td>{{ $item->course }}</td>
                                            <td>{{ $item->section }}</td>
                                            <td>{{ $item->lecture }}</td>
                                            <td>{{ $item->file }}</td>
                                            <td> <video width="100" height="100" controls class="thumb"
                                                    data-full="{{ asset('public/storage/course') }}/{{ $item->file }}">
                                                    <source
                                                        src="{{ asset('public/storage/course') }}/{{ $item->file }}">
                                                </video>
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a class="btn btn-success btn-sm" style="color:white"> Active
                                                    </a>

                                                @else
                                                    <a class="btn btn-danger btn-sm" style="color:white"> OFF
                                                    </a>

                                                @endif


                                            </td>
                                            <td><a href="{{ route('course.delete', [$item->id]) }}"
                                                    class="btn btn-danger btn-sm" style="color:white"> Delete
                                                </a></td>
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
