@extends('Admin.layout.admin')
@section('content')

<script>
$(document).ready(function(){
	$.validator.addMethod("alphanumeric", function(value, element) {

	return this.optional(element) || /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$/i.test(value);

	}, "Passwords are 7-19 characters Must contain at least one letter and one number and a special character.");
	
$('#addForm').validate({

	 rules: {

			password: {
            required: true,
            minlength: 7
        },
        password_confirm: {
            required: true,
            minlength: 7,
            equalTo: "#password"
        },
		 current_password: {
			required: true,
			 remote: { 
				url:"<?=BASE_PATH?>admin/passwordMatch", 
				data: {'value':$("input[name$='current_password']" ).val()},
				async:false 

			}

		}

			},

			messages: {

				password_confirm: { 
                 equalTo:"Enter Confirm Password Same as Password"

               },

				current_password: {

					required:"This field is required.",
					remote: "Password not matched."

				},

				

			}

	});

});

</script>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
	  {{ !empty($title)?$title:N/A}}
      </h1>
		{!! Breadcrumbs::render('resetPassword') !!}
		
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
				@if(Session::has('success'))

				<div class="alert alert-success">
					<span class="glyphicon glyphicon-ok"></span>
					<em> {!! session('success') !!}</em>
				</div>
				@endif
            
				<div class="box-header with-border">
					@if ($errors->has())

					<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }}
					<br>        
					@endforeach

					</div>
					@endif

					<h3 class="box-title"></h3>
				</div>
			{{ Form::open(array('url' => 'admin/reset_password', 'id'=>'addForm','method' => 'post')) }} 
             {{ Form::hidden('id', !empty(Auth::user()->id)? Crypt::encrypt(Auth::user()->id):'') }}
			 {{ Form::hidden('userDetailId', !empty($user->usrDetailId)? Crypt::encrypt($user->usrDetailId):'') }}
			 
						<div class="box-body">
							<div class="input-group">
								<span class="input-group-addon">Password</span>
								{{ Form::password('current_password',array('class' => 'form-control required','placeholder'=>'Current Password')) }}
                            </div>
							<div class="input-group">
					 			<span class="input-group-addon">New password  </span>
                                 {{ Form::password('password', array('class' => 'form-control alphanumeric required','placeholder'=>'New Password','id'=>'password')) }}
                            </div>
							<div class="input-group">
								<span class="input-group-addon">Confirm Password</span>
				             {{ Form::password('password_confirm', array('class' => 'form-control alphanumeric required','placeholder'=>'Confirm Password')) }}
				           </div>
						</div>
						<div class="box-footer">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
                       {{ Form::close() }}
          
					</div>
				</div>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	
    @endsection