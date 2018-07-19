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
        <li class="active">Add Banner</li>
      </ol>
    </section>
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Banner</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
	<section class="content"> 
		
		<form role="form" action="{{route('admin.add.banner')}}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
			<div class="box-body">
			<div class="form-group{{ $errors->has('bannerName') ? ' has-error' : '' }}">
				<label>Banner Name</label>
                <div class="row">
				    <div class="col-xs-6">
						<input name="bannerName" type="text"  class="form-control" placeholder="enter banner name" required>
					</div>
				</div>
			  @if ($errors->has('bannerName'))
				<span class="help-block">
				  <strong>{{ $errors->first('bannerName') }}</strong>
				</span>
			  @endif
			</div>
          
			<div class="form-group{{ $errors->has('bannerText') ? ' has-error' : '' }}">
				<label for="exampleInputreason1">Description</label>
					<div class="row">
						<div class="col-xs-6">
							<textarea rows="4" cols="50" class="form-control input_width" id="bannerText" name="bannerText"  placeholder="text"></textarea>
						</div>
					</div>
				@if ($errors->has('bannerText'))
					<span class="help-block">
						<strong>{{ $errors->first('bannerText') }}</strong>
					</span>
				@endif	
			</div>
			
			<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
                <label>Status</label>
                <div class="row">
				    <div class="col-xs-6">
                    <select class="form-control" name="status" id="status" required>
                        <option value="0">active</option>
                        <option value="0">Inactive</option>                  
                    </select>
                   </div>
				</div>
                @if ($errors->has('status'))
					<span class="help-block">
						<strong>{{ $errors->first('status') }}</strong>
					</span>
				@endif
			</div>
		  
			<div class='form-group'>
                <input type="file" name="bannerImage" id="fileToUpload" class = 'btn btn-default btn-file' multiple>
            </div>    
		  
		  
		  
            </div>
              <!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
        </form>
    </section>
            

    </div>
<script type="text/javascript">

	$(function() {
		CKEDITOR.replace('bannerText');
		
		$(".textarea").wysihtml5();
	});


</script>    
@endsection
