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
        <li class="active">Add Customer</li>
      </ol>
    </section>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
            <section class="content"> 
               <section class="content"> 
      <form role="form" action="{{ route('add-new-customer') }}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
		<div class="box-body">
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label>Name</label>
				<div class="row">
					<div class="col-xs-6">
					<input name="name" type="text" value="{{ old('name')}}" class="form-control" placeholder="enter name" required>
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
                      <input name="email" type="email" value="{{ old('email')}}" class="form-control" placeholder="enter email" rquired>
                  </div>
                
				      </div>
              @if ($errors->has('email'))
									<span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
          
          <div class="form-group">
			   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label>Password </label>
                <div class="row">
				          <div class="col-xs-6">
                  <input class="form-control alphanumeric required" placeholder="Password" id="password" name="password" type="password" value="">
                  </div>
				        </div>
                  @if ($errors->has('password'))
									<span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
          </div>
          <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
              <label>Confirm Password</label>
                <div class="row">
				          <div class="col-xs-6">
							<input class="form-control alphanumeric required" placeholder="Confirm Password" name="password_confirm" type="password" value="">
						</div>
				</div>
                  @if ($errors->has('password_confirm'))
									<span class="help-block">
                      <strong>{{ $errors->first('password_confirm') }}</strong>
                  </span>
                  @endif
          </div>
          
       <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
              <label>Mobile No.</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="number" type="text" value="{{ old('number')}}" class="form-control" placeholder="Enter mobile no." required>
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
						<input name="address" type="text" value="{{ old('address')}}" class="form-control" placeholder="Enter address" required>
                  </div>
				</div>
                  @if ($errors->has('address'))
									<span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif
          </div>
          
		   <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                  <label for="country">country</label>
                   <div class="row">
						<div class="col-xs-6">
							 <select class="form-control select2" name="country" id="countryListHere">								
								@foreach($countries as $country)
									<option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
								@endforeach         
							 </select>                     
						</div>
                </div>
                @if ($errors->has('country'))
					<span class="help-block">
						<strong>{{ $errors->first('country') }}</strong>
					</span>
				@endif
            </div>  
            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                  <label for="state">State</label>
                    <div class="row">
						<div class="col-xs-6">
							<select class="form-control select2" name="state" id="stateListHere">
								<option value="0">Select state</option>
								@foreach($countries[0]->getStates as $state)
									<option value="{{$state->id}}">{{ucfirst($state->name)}}</option>
								@endforeach 
							</select>
					</div>
                </div>
                @if ($errors->has('state'))
					<span class="help-block">
						<strong>{{ $errors->first('state') }}</strong>
					</span>
				@endif
             </div>  
             <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                  <label for="city">City</label>
                   <div class="row">
					   <div class="col-xs-6">
						 <select class="form-control select2" name="city" id="cityListHere">
							<option value="0">Select city</option>
						 </select>
					</div> 
				</div>
				@if ($errors->has('city'))
					<span class="help-block">
						<strong>{{ $errors->first('city') }}</strong>
					</span>
				@endif
            </div>   
                    
          <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
              <label>Pincode</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="pincode" type="text" value="{{ old('pincode')}}"  class="form-control" placeholder="Enter pincode" required>
                  </div>
				</div>
                  @if ($errors->has('pincode'))
									<span class="help-block">
                      <strong>{{ $errors->first('pincode') }}</strong>
                  </span>
                  @endif
          </div> 
		
			
          <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} ">
                  <label>Status</label>
                  <div class="row">
				  <div class="col-xs-6">
                  <select class="form-control" name="status" id="status" >
                    <option value="1">active</option>
                    <option value="0">Inactive</option>                  
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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </section>
            </section>
            

          </div>
  
  
@endsection
