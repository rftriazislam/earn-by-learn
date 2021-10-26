@extends('user_panel.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3>Your Referral Link :</h3>

        <div class="card-body">
            <div class="form-group">

                <input class="form-control col-6" type="text" style="float: left;" value="{{ $v }}" id="myInput">
                <button class="ps-btn btn-info" style="float: none;height: 38px;" onclick="myFunction()">Copy</button>
            </div>
        </div>


    </div>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // $('#s').append('dddd')
        }
    </script>
@endsection
