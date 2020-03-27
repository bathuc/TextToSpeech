@extends('layouts.index')

@section('content')
    <div class="pt-4"></div>

    @if(session()->has('message'))
        <div class="alert alert-success"> {{ session('message') }} </div>
    @endif

    <form id="frmForm" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-wrapper w-50">
            <div class="form-group row">
                <label class="col-md-3">File</label>
                <div class="col-md-9">
                    <input id="file" name="file" type="file" class="form-control-file">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3"></label>
                <div class="col-md-9 btn-submit">
                    <button type="button" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $('.btn-submit').click(function(){
                $("#frmForm").validate({
                    rules: {
	                    file: { required: true },
                    },
                });

                $('.btn-submit').click(function(e){
                    if ($("#frmForm").valid()) {
                        $("#frmForm").submit();
                    }
                });
            });
        });
    </script>
@endsection