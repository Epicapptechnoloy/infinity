@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Discount and Offers</li>
      </ol>
    </section>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Discount and Offers</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
            <section class="content"> 
               <section class="content"> 
      <form role="form" action="#" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
		<div class="box-body">
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label>Name </label>
				<div class="row">
					<div class="col-xs-6">
					<input name="name" type="text"  class="form-control" placeholder="enter name" required>
				</div>
			</div>
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
           
         
			   <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
              <label>Code </label>
                <div class="row">
				          <div class="col-xs-6">
                  <input name="code" type="text"  class="form-control" placeholder="enter code" required>
                  </div>
				        </div>
                  @if ($errors->has('code'))
									<span class="help-block">
                      <strong>{{ $errors->first('code') }}</strong>
                  </span>
                  @endif
          </div>
          
          
			   <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
              <label>Discount </label>
                <div class="row">
				          <div class="col-xs-6">
                  <input name="discount" type="text"  class="form-control" placeholder="enter discount" required>
                  </div>
				        </div>
                  @if ($errors->has('discount'))
									<span class="help-block">
                      <strong>{{ $errors->first('discount') }}</strong>
                  </span>
                  @endif
          </div>
          <div class="form-group{{ $errors->has('minimum_order') ? ' has-error' : '' }}">
              <label>Minimum Order </label>
                <div class="row">
				          <div class="col-xs-6">
							<input name="minimum_order" type="text"  class="form-control" placeholder="enter Minimum Order" required>
						</div>
				</div>
                  @if ($errors->has('minimum_order'))
									<span class="help-block">
                      <strong>{{ $errors->first('minimum_order') }}</strong>
                  </span>
                  @endif
          </div>
          
       
		<div class="form-group{{ $errors->has('total_discount') ? ' has-error' : '' }}">
              <label>Total Discount</label>
                <div class="row">
				   <div class="col-xs-6">
						<input name="total_discount" type="text"  class="form-control" placeholder="Enter Total Discount" required>
                  </div>
				</div>
                  @if ($errors->has('total_discount'))
									<span class="help-block">
                      <strong>{{ $errors->first('total_discount') }}</strong>
                  </span>
                  @endif
          </div>
          
          
          <div class="form-group{{ $errors->has('ctype') ? ' has-error' : '' }} ">
                  <label>Select Type</label>
                 <div class="row">
				   <div class="col-xs-6">
					 <select class="form-control" name="ctype" id="ctype" >
						<option value="0">Select Type</option>
						<option value="1">Flat</option>
						<option value="2">Percentage</option>
					   
					  </select>
					</div>
				</div>
				@if ($errors->has('ctype'))
					<span class="help-block">
						<strong>{{ $errors->first('ctype') }}</strong>
					</span>
				@endif
          </div>
          
				<div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
						<label>Start Date:</label>

						<div class="row">
							<div class="col-xs-6">
							  <div class='input-group date' >
								  <input type='text' name="startdate" class="form-control" id='datepicker' placeholder="Start Date:"/>
								  <span class="input-group-addon">
									  <span class="glyphicon glyphicon-calendar"></span>
								  </span>
							  </div>
							</div>
						<!-- /.input group -->
					  </div>
				  <!-- /.form group -->
				</div>
		  
				<div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
					<label>End Date:</label>
					 <div class="row">
						 <div class="col-xs-6">
							<div class='input-group date' >
							  <input type='text' name="enddate" class="form-control" id='datepicker1' placeholder="End Date:"/>
							  <span class="input-group-addon">
								  <span class="glyphicon glyphicon-calendar"></span>
							  </span>
						  </div>
					   </div><!-- col group-->
					   <!-- /row-->
					 </div>
					<!-- /.form group -->
				</div>
				
		
			   <div class="form-group{{ $errors->has('uses_total') ? ' has-error' : '' }}">
              <label>Uses total</label>
                <div class="row">
				          <div class="col-xs-6">
                  <input name="uses_total" type="text"  class="form-control" placeholder="enter Uses total" required>
                  </div>
				        </div>
                  @if ($errors->has('uses_total'))
									<span class="help-block">
                      <strong>{{ $errors->first('uses_total') }}</strong>
                  </span>
                  @endif
          </div>
           <div class="form-group{{ $errors->has('uses_per_customer') ? ' has-error' : '' }}">
              <label>Uses Per Customer </label>
                <div class="row">
				  <div class="col-xs-6">
                  <input name="uses_per_customer" type="text"  class="form-control" placeholder="enter Uses Per Customer" required>
                  </div>
				        </div>
                  @if ($errors->has('uses_per_customer'))
									<span class="help-block">
                      <strong>{{ $errors->first('uses_per_customer') }}</strong>
                  </span>
                  @endif
			</div>

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="exampleInputreason1">Description</label>
					<div class="row">
						<div class="col-xs-6">
							<textarea rows="4" cols="50" class="form-control input_width" id="exampleInputreason1" name="description"  placeholder="description"></textarea>
						</div>
					</div>
				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
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
          
            

            
            <div class='form-group'>
                <input type="file" name="image" id="fileToUpload" class = 'btn btn-default btn-file' multiple>
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
<script type="text/javascript">
 $(function () {
  //Timepicker
    $(".Fromtimepicker").timepicker({
      showInputs: false
    });

    //Timepicker
    $(".Totimepicker").timepicker({
      showInputs: false
    });
  });  
</script> 
<script>
  $(function () {
     $('#datepicker').datepicker({
      autoclose: true
    });
	$('#datepicker1').datepicker({
      autoclose: true
    });
  });
</script>  
  
@endsection
