@extends('adminlayouts.master')
@section('breadcrumb')
<section class="content-header">
      <h1>
        {{Config::get('settings.cms')}} management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
         <li class="">{{Config::get('settings.cms')}} management</li>
         <li class="">Edit-{{Config::get('settings.cms')}}</li>
      </ol>
</section>
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit {{Config::get('settings.cms')}}</h3>
            </div>
            <!-- /.box-header -->
             @include('adminlayouts.message')
            
            <!-- form start -->
            <form role="form" method="post" action="{{route('editcmsPost')}}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <input type="hidden" name="cms_id" value="{{$cms->id}}">
              <div class="box-body">
                
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title">Title</label>
                  <input value="{{ $cms->title }}" class="form-control" id="title" name="title" placeholder="Enter title name" type="text">
                </div>
               
                  
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
					<label for="description">Description</label>
					<div class="box-body pad">
						<textarea name="description" required class="form-control" id="description"  placeholder="description"> {{ $cms->description }}</textarea>
					</div>
			   </div>
			   
               
                
                
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
	<script type="text/javascript">
		$(function() {
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace('description');
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
		});
	</script>
	
	
@endsection
