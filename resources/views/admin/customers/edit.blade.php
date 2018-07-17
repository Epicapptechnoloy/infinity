@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Customer</li>
      </ol>
    </section>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Customer</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
            <section class="content"> 
               <section class="content"> 
      <form role="form" action="{{ route('update-customer') }}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" value="{{ $customer->id}}" name="customer_id"/>
		<div class="box-body">
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label>Name</label>
				<div class="row">
					<div class="col-xs-6">
					<input name="name" type="text" value="{{ $customer->name }}" class="form-control" placeholder="enter name" required>
				</div>
			</div>
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label>Email</label>
              <div class="row">
				          <div class="col-xs-6">
                      <input name="email" type="email" value="{{ $customer->email }}" class="form-control" placeholder="enter email" rquired>
                  </div>
                
				      </div>
              @if ($errors->has('email'))
									<span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
          
          
          
       <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
              <label>Mobile No.</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="number" type="text" value="{{ $customer->number }}" class="form-control" placeholder="Enter mobile no." required>
                  </div>
				</div>
                  @if ($errors->has('number'))
									<span class="help-block">
                      <strong>{{ $errors->first('number') }}</strong>
                  </span>
                  @endif
          </div>  
          
		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label>Address</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="address" type="text" value="{{ $customer->address }}" class="form-control" placeholder="Enter address" required>
                  </div>
				</div>
                  @if ($errors->has('address'))
									<span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif
          </div>
          
		   
           
                    
          <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
              <label>Pincode</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="pincode" type="text" value="{{ $customer->zipcode }}"  class="form-control" placeholder="Enter pincode" required>
                  </div>
				</div>
                  @if ($errors->has('pincode'))
									<span class="help-block">
                      <strong>{{ $errors->first('pincode') }}</strong>
                  </span>
                  @endif
          </div> 
		
			
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
			<label>Status</label>
			<div class="row">
				<div class="col-xs-6">
					<select class="form-control" name="status" id="status" >
						<option value="1" {{ ($customer->status == 1) ? 'selected=selected' : '' }}>active</option>
						<option value="0" {{ ($customer->status == 0) ? 'selected=selected' : '' }}>Inactive</option>                  
					</select>
					@if ($errors->has('status'))
					<span class="help-block">
						<strong>{{ $errors->first('status') }}</strong>
					</span>
				@endif
				</div>
			</div>
	    </div>  
          
                        
       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            </section>
            </section>
            

          </div>
  
  
@endsection
