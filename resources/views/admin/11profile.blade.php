@extends('Admin.layout.admin')
@section('content')
<script>
$(document).ready(function() {
	$('#addForm').validate({
	 rules: {
				avatar: {
					//required: true,
					accept: "png|jpeg|jpg",
				}
				
			},
			messages: {
				avatar: {
					//required: 'Required!',
					accept: 'Not an image!'
				}
			}
	});
});
</script>
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
       {{ !empty($title)? $title: 'N/A'}}
		</h1>		
		{!! Breadcrumbs::render('profile') !!}		
	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
		  @if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
        @endif
            <div class="box-header with-border">
			@if ($errors->has())
   <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
              <h3 class="box-title"></h3>
            </div>
			{{ Form::open(array('id'=>'addForm','method' => 'post','files'=> true)) }} 
             {{ Form::hidden('id', !empty($user->id)? Crypt::encrypt($user->id):'') }}
			 {{ Form::hidden('userDetailId', !empty($user->usrDetailId)? Crypt::encrypt($user->usrDetailId):'') }}
			 <?php
			  $required='required';
			 if(!empty($user->id))
			 $required=''; ?>
			  <div class="box-body">
				  <div class="input-group">
					<span class="input-group-addon">First Name</span>
					{{ Form::text('first_name',!empty($user->first_name)?$user->first_name:'',array('class'=>'form-control required','placeholder'=>"First Name")) }}
				  </div>
				  <div class="input-group">
					<span class="input-group-addon">Last Name</span>
					{{ Form::text('last_name',!empty($user->last_name)?$user->last_name:'',array('class'=>'form-control required','placeholder'=>"Last Name")) }}
				  </div>
                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    {{ Form::text('email', !empty($user->email)?$user->email:'',array('class'=>'required email form-control','placeholder'=>'Email')) }}
                    
                    <!--<input type="text" class="form-control" placeholder="Username">-->
                </div>
				<div class="input-group">
                 <span class="input-group-addon">Mobile</span>
				 {{ Form::text('mobile',!empty($user->mobile)?$user->mobile:'',array('class'=>'form-control     required','maxlength'=>10,'placeholder'=>"Mobile")) }}
              </div>
				
				<!--<div class="input-group">
                    <span class="input-group-addon">Image</span>
                      <input type="file" class="btn btn-default btn-file" name="image" onchange="loadFile(event)"/></span>            
                </div>
			 <div >
				<?php 
					$imageSrc =  ImagePath .'/avatar/default.png';
					if(!empty($user->userDetail->photo))  {
						$imageSrc = URL::to('/') . '/public/images/salesadmin/thumb/'.$user->userDetail->photo;
					}
				?>
				<img class="img-circle" width="160" id="userImagePreview" height="160" src="<?php echo $imageSrc ?>" />
					
				
			 </div>-->
              </div>
              <!-- /.box-body -->
			  
            
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

	<script>
		var loadFile = function(event) {
			var output = document.getElementById('userImagePreview');
			output.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>
	
    @endsection
	
	
	
