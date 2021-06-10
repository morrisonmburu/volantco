@extends('layouts.app')

@section('content')
<!-- Form with validation -->

<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">
    <div class="card mb-0 login-form">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1" style="color: #8F0236;"></i>
                <h5 class="mb-0">Activate Your account</h5>
            </div>

            <input type="hidden" name="driver_id" value="{{ $data[0]->id }}">

            <div class="form-group">
                <input type="text" disabled class="form-control" name="email" value="{{ $data[0]->email }}" required="required" >
            </div>

            <div class="form-group">
                <input type="text" disabled class="form-control" value="{{ $data[0]->phoneNo }}" required="required" >
            </div>

            <div class="form-group">
                <button onclick="Activate({{ $data[0]->id }})" style="background-color: #8F0236; color: #ffffff;" class="btn btn-primary btn-block">Activate <i class="icon-circle-right2 ml-2"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- /form with validation -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    function Activate(driver_id){
        jQuery.ajax({
        url:'{{ route("activate_driver") }}',
        method:"POST",
        data:{ driver_id: driver_id, _token: '{{csrf_token()}}'},
        success:function(result)
        {
            swal('Driver'+result, "You have successfully Activated Your Account😎!", "success").then(function(){ 
                window.location = 'https://volantco.net/';
            }
            );
        },
        error : function(){alert("Something Went Wrong.");},
    });
    }
</script>

@endsection
