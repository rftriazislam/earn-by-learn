@extends('user_panel.master')
@section('content')


    <section class="content-wrapper">

        <section class="content">

            <h1 class="text-center">Tutorial Video </h1>
            <hr>
            <div class="row">


                <div class="col-md-7">


                    <h4> <b> Section : {{ $play->section }} </b></h4>
                    <video width="400px" style="width:100%;" height="360px" controls controlsList="nodownload" autoplay
                        class="thumb" data-full="{{ asset('public/storage/course') }}/{{ $play->file }}">
                        <source src="{{ asset('public/storage/course') }}/{{ $play->file }}" type="video/mp4">
                    </video>

                    <h4> <b>Lession : {{ $play->lecture }} </b></h4>
                    <hr>
                    <h2>
                        @if ($play->course == 'Digital')
                            <b>Digital marketing | social media marketing</b>
                        @else

                        @endif


                    </h2>



                </div>

                <div class="col-md-5">
                    <div class="table-responsive" style="width: 100%;height: 600px;overflow: scroll;display: block;">
                        <table class="table ps-table" style="background: white">

                            <tbody>

                                @foreach ($course as $item)


                                    <tr @if ($item->id == $play->id) style="background:#cccccc" @endif>

                                        <td>
                                            #{{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <h5> {{ $item->course }}</h5>
                                        </td>
                                        <td>
                                            <h5> {{ $item->section }}</h5>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.play', [$item->id]) }}">
                                                <h5> {{ $item->lecture }}</h5>
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
    <script>
        $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        });
        document.onkeydown = function(e) {
            if (e.ctrlKey &&
                (e.keyCode === 67 ||
                    e.keyCode === 86 ||
                    e.keyCode === 85 ||
                    e.keyCode === 117)) {
                return false;
            } else {
                return true;
            }
        };
        $(document).keypress("u", function(e) {
            if (e.ctrlKey) {
                return false;
            } else {
                return true;
            }
        });
    </script>
@endsection
