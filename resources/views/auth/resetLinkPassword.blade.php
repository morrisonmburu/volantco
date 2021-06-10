@extends('layouts.app')

@section('content')
<!-- Form with validation -->

<div class="content d-flex justify-content-center align-items-center">
    <div class="card mb-0 login-form">
        <div class="card-body">
        <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1" style="color: #8F0236;"></i>
                <h5 class="mb-0">Reset Your Password </h5>
            </div>

        <input type="hidden" name="driver_id" value="{{ $data[0]->id }}">

        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="password" class="form-control" placeholder="New Password" name="password" id="password" required="required">
            <span class="invalid-feedback" role="alert">
              <strong style="color:red;" id="message"></strong>
            </span>
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="password" class="form-control" name="c_password" id="c_password" required="required" placeholder="Confirm New Password" required>
            <span class="invalid-feedback" role="alert">
              <strong id="message"></strong>
            </span>
            
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>

        <div class="form-group">
            <button onclick="Reset({{ $data[0]->id }})" style="background-color: #8F0236; color: #ffffff;" class="btn btn-primary btn-block">Reset Password<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</div>
</div>

<!-- /form with validation -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    function Reset(driver_id){
        var new_password = $('#password').val();
        var c_password = $('#c_password').val();
        if(new_password !== c_password){
            $('#message').text('Your passwords do not match');
        }else{
            jQuery.ajax({
                url:'{{ route("riders.resetPasswordLink") }}',
                method:"POST",
                data:{ driver_id: driver_id, new_password: new_password, c_password: c_password, _token: '{{csrf_token()}}'},
                success:function(result)
                {
                    swal('Associate'+result, "You have successfully Reset Your Password!", "success").then(function(){ 
                        window.location = 'https://volantltd.com/';
                    }
                    );
                },
                error : function(){alert("Something Went Wrong.");},
            });
        }
    }
</script>

@endsection
