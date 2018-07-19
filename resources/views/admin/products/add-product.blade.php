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
        <li class="active">Add Product</li>
      </ol>
    </section>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
    <section class="content"> 
		<section class="content"> 
			<form role="form" action="{{route('admin.add.product')}}" method="post"  enctype="multipart/form-data">
					  {{ csrf_field() }}
				<div class="box-body">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Name </label>
							<div class="row">
								<div class="col-xs-6">
								<input name="name" type="text"  class="form-control" autocomplete="off" placeholder="enter name" required>
							</div>
						</div>
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
				  
					<div class="form-group">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>SKU </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="sku" type="text"  class="form-control" autocomplete="off" placeholder="enter sku" required>
								</div>
							</div>
							@if ($errors->has('sku'))
							<span class="help-block">
								<strong>{{ $errors->first('sku') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
							<label>Model </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="model" type="text"  class="form-control"  autocomplete="off" placeholder="enter model" required>
								</div>
							</div>
							@if ($errors->has('model'))
							<span class="help-block">
								<strong>{{ $errors->first('model') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
							<label>Quantity </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="quantity" type="text"  class="form-control"  autocomplete="off" placeholder="enter quantity" required>
								</div>
							</div>
							@if ($errors->has('quantity'))
							<span class="help-block">
								<strong>{{ $errors->first('quantity') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
						  <label>Price </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="price" type="text"  class="form-control" autocomplete="off" placeholder="enter price" required>
								</div>
							</div>
							@if ($errors->has('price'))
							<span class="help-block">
								<strong>{{ $errors->first('price') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
						  <label>Size </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="size" type="text"  class="form-control"  autocomplete="off" placeholder="enter size" required>
								</div>
							</div>
							@if ($errors->has('size'))
							<span class="help-block">
								<strong>{{ $errors->first('size') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
						  <label>Color </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="color" type="text"  class="form-control" autocomplete="off" placeholder="enter color" required>
								</div>
							</div>
							@if ($errors->has('color'))
							<span class="help-block">
								<strong>{{ $errors->first('color') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
						  <label>Points </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="points" type="text"  class="form-control" autocomplete="off" placeholder="enter points" required>
								</div>
							</div>
							@if ($errors->has('points'))
							<span class="help-block">
								<strong>{{ $errors->first('points') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
						  <label>Weight </label>
							<div class="row">
								<div class="col-xs-6">
									<input name="weight" type="text"  class="form-control" autocomplete="off" placeholder="enter weight" required>
								</div>
							</div>
							@if ($errors->has('weight'))
							<span class="help-block">
								<strong>{{ $errors->first('weight') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} ">
						<label>Select Category</label>
						<div class="row">
						<div class="col-xs-6">
						<select class="form-control" name="category" id="category" >
							<option value="0">Select Category</option>
							@foreach($categories as $category)
							@php $Id = $category->category_id @endphp
							<option value="{{$category->category_id}}" @if (old('category') == $Id) selected="selected" @endif>{{$category->name}}</option>
							@endforeach
						</select>
						</div>
						</div>
						@if ($errors->has('category'))
							<span class="help-block">
								<strong>{{ $errors->first('category') }}</strong>
							</span>
						@endif
					</div>
				  
					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="exampleInputreason1">Description</label>
							<div class="row">
								<div class="col-xs-6">
									<textarea rows="4" cols="50" class="form-control input_width" id="description" name="description"  placeholder="description"></textarea>
								</div>
							</div>
						@if ($errors->has('description'))
							<span class="help-block">
								<strong>{{ $errors->first('description') }}</strong>
							</span>
						@endif	
					</div>
				  
					<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
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
	<script type="text/javascript">
	$(function() {
		CKEDITOR.replace('description');
		$(".textarea").wysihtml5();
	});
	
	$(function () {
		$(".Fromtimepicker").timepicker({
			showInputs: false
		});

		$(".Totimepicker").timepicker({
			showInputs: false
		});
	});  
	</script>     
@endsection
