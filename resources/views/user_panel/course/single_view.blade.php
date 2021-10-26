@extends('user_panel.master')
@section('content')


    <section class="content-wrapper">

        <section class="content">

            <h1 class="text-center">Tutorial Video </h1>
            <hr>
            <div class="row">


                <div class="col-md-7">



                    <video width="400px" style="width:100%;" height="360px" controls autoplay class="thumb"
                        data-full="{{ asset('public/storage/course') }}/{{ $play->file }}">
                        <source src="{{ asset('public/storage/course') }}/{{ $play->file }}" type="video/mp4">
                    </video>

                    <h4>{{ $play->lecture }}</h4>



                </div>

                <div class="col-md-5">
                    <div class="table-responsive" style="width: 100%;height: 600px;overflow: scroll;display: block;">
                        <table class="table ps-table" style="background: white">

                            <tbody>

                                @foreach ($course as $item)


                                    <tr @if ($item->id == $play->id) style="background:#cccccc" @endif>

                                        <td>
                                            #{{ $loop->index++ }}
                                        </td>
                                        <td>
                                            <h5> {{ $item->section }}</h5>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.play', [$item->id]) }}">
                                                <h5> {{ $item->lecture }}</h5>
                                            </a>

                                        </td>

                                        <td>
                                            <a href="{{ route('course.play', [$item->id]) }}">
                                                <video width="100" height="100" controls class="thumb"
                                                    data-full="{{ asset('storage/course') }}/{{ $item->file }}">
                                                    <source src="{{ asset('storage/course') }}/{{ $item->file }}">
                                                </video>
                                            </a>
                                        </td>


                                    </tr>


                                @endforeach




                            </tbody>

                        </table>


                    </div>

                </div>
            </div>

        </section>

    </section>
@endsection
