@extends('layouts.master')

@section('content')
	

<!-- RESET PASSWORD START HERE -->
<div class="content viewContainer sldrfullpge">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="loginbox">
                    <div class="loginregister">
                        <div class="tab-content">
                            <div id="registerdiv" role="tabpanel" class="tab-pane active">
                                <div class="f16 loginregisterheading fbold reset">Reset Password</div>
                                <div class="borderline h30"></div>
                                <div class="loginregister">
                                    <form class="resetPasswordForm" method="POST" id="resetPwd" enctype="form-data" role="form" action="{{url('process-reset-password')}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id" value="{{$id}}">
                                        <div class="form-group row reset{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="col-sm-12">
                                                <input type="password" placeholder="Choose New Password" id="resetPassword" name="password" class="form-control"> 
                                                @if ($errors->has('password'))
													<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
                                            </div>
                                        </div>
                                        <div class="form-group row reset{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <div class="col-sm-12">
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"> 
												@if ($errors->has('password_confirmation'))
													<span class="help-block">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
													</span>
												@endif
                                            </div>
                                        </div>
                                        <div class="form-group  reset">
                                            <button type="submit" id="resetPwdpopup" class="btn btn-primary btn-block">Reset</button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- RESET PASSWORD END HERE -->
<script>
	$(document).ready(function(){
		$(".resetPasswordForm").validate({
			rules: {
				
				password: {
					required: true,
					regex: /^[A-Za-z].*[0-9]|[0-9].*[A-Za-z]+$/,
					minlength: 6,
					maxlength:25
				},
			  
				password_confirmation: {
					required: true,
					minlength: 6,
					maxlength:25,
					equalTo: "#resetPassword"
				},
			   
				
			},
			messages: {
				
				password: {
					required: "*Password is required field.",
					minlength: "Minimum length of password is 6",
					regex: "Password must contain at least one letter and one number.",
					maxlength: "MaxLength of password is 25."
				},
				password_confirmation: {
					required: "*This is required field.",
					minlength: "Minimum length of password is 6.",
					maxlength: "MaxLength of password is 25.",
					equalTo: "Password doesn't matched"
				}
			   
			},
		});

	});
</script>
@endsection

