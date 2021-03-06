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
			<li class="active">Edit Product Details</li>
		</ol> 
	</section>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Product Details</h3>
        </div>
        <!-- /.box-header -->
        <section class="content"> 
            <form role="form" action="{{route('editProductProcess')}}" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="productId" value="{{$Products->product_id}}">
              {{ csrf_field() }}
				<div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Product name </label>
							<div class="row">
								<div class="col-xs-6">
								<input name="name" type="text" class="form-control" value="{{$Products->productName}}">
								</div>
							</div>
                        @if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
                        @endif
                    </div>
             
                    <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                        <label>Model</label>
						<div class="row">
							<div class="col-xs-6">
							<input name="model" type="text" class="form-control" value="{{$Products->model}}" placeholder="enter description">
							</div>
						</div>
                        @if ($errors->has('model'))
							<span class="help-block">
								<strong>{{ $errors->first('model') }}</strong>
							</span>
						@endif
                    </div>
               
                    <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                        <label>SKU</label>
                        <div class="row">
                            <div class="col-xs-6">
                            <input name="sku" type="text" class="form-control  input_width" value="{{$Products->sku}}"  placeholder="enter sku">
                            </div>
                        </div>
                        @if ($errors->has('sku'))
								<span class="help-block">
									<strong>{{ $errors->first('sku') }}</strong>
								</span>
                        @endif
                    </div>
					
					<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label>Price</label>
                        <div class="row">
                            <div class="col-xs-6">
                            <input name="price" type="text" class="form-control  input_width" value="{{$Products->price}}"  placeholder="enter price">
                            </div>
                        </div>
                        @if ($errors->has('price'))
							<span class="help-block">
								<strong>{{ $errors->first('price') }}</strong>
							</span>
                        @endif
                    </div>
					
					<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
						<label>Color</label>
						<div class="row">
							<div class="col-xs-6">
								<select  class="form-control single " name="color" id="color_id" data-bind="color" >
								@if(!empty($productColors)) 
								@foreach($productColors as $p_color)								
								 <option value="{{$p_color->color_id}}" @if($Products->color_id == $p_color->color_id) selected @endif  >{{$p_color->color_name}}</option>
								@endforeach
								@endif
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
						<label>Size</label>
						<div class="row">
							<div class="col-xs-6">
								<select  class="form-control single " name="size" id="size_id" data-bind="size" >
								@if(!empty($productSizes)) 
								@foreach($productSizes as $p_size)								
								 <option value="{{$p_size->size_id}}" @if($Products->size_id == $p_size->size_id) selected @endif  >{{$p_size->size_name}}</option>
								@endforeach
								@endif
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
                        <label>Points</label>
                        <div class="row">
                            <div class="col-xs-6">
                            <input name="points" type="text" class="form-control  input_width" value="{{$Products->points}}"  placeholder="enter points">
                            </div>
                        </div>
                        @if ($errors->has('points'))
							<span class="help-block">
								<strong>{{ $errors->first('points') }}</strong>
							</span>
                        @endif
                    </div>
					
					<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                        <label>Weight</label>
                        <div class="row">
                            <div class="col-xs-6">
                            <input name="weight" type="text" class="form-control  input_width" value="{{$Products->weight}}"  placeholder="enter weight">
                            </div>
                        </div>
                        @if ($errors->has('weight'))
							<span class="help-block">
								<strong>{{ $errors->first('weight') }}</strong>
							</span>
                        @endif
                    </div>
					
					
					<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label>Quantity</label>
                        <div class="row">
                            <div class="col-xs-6">
                            <input name="quantity" type="text" class="form-control  input_width" value="{{$Products->quantity}}"  placeholder="enter quantity">
                            </div>
                        </div>
                        @if ($errors->has('quantity'))
							<span class="help-block">
								<strong>{{ $errors->first('quantity') }}</strong>
							</span>
                        @endif
                    </div>
					
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
						<label>Category</label>
						<div class="row">
							<input type="hidden" id="cat_id" value='{{$Products->category_id}}'>
							<input type="hidden" id="sub_cat_id" value='{{$Products->sub_category_id}}'>
							<div class="col-xs-6">
								<select  class="form-control single " name="category" id="category_id" data-bind="category" >
								@if(!empty($categories)) 
								@foreach($categories as $ct)								
								 <option value="{{$ct->category_id}}" @if($Products->category_id == $ct->category_id) selected @endif  >{{$ct->name}}</option>
								@endforeach
								@endif
								</select>
							</div>
						</div>
					</div>
					
					
					<div id="sub-category-div" class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }} ">
						<label>Sub Category</label>
						<div class="row">
							<div class="col-xs-6">
								<select class="form-control" name="sub_category_id" id="sub_category_id" >
								
								</select>
							  
							</div>
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
						<label>Status</label>
						<div class="row">
							  <div class="col-xs-6">
							  <select class="form-control" name="status" id="status" >
								<option <?php if($Products->productStatus==1){ echo "selected"; } ?> value="1"><b>Active</b></option> 
								<option <?php if($Products->productStatus==0){ echo "selected"; } ?> value="0"><b>Inactive</b></option> 
							  </select>
							  @if ($errors->has('status'))
								<span class="help-block">
									<strong>{{ $errors->first('status') }}</strong>
								</span>
							@endif
							</div>
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="exampleInputreason1">Description</label>
							<div class="row">
								<div class="col-xs-6">
									<textarea rows="4" cols="50" class="form-control input_width" id="description321" name="description"  placeholder="description">{{$Products->productDescription}}</textarea>
								</div>
							</div>
						@if ($errors->has('description'))
							<span class="help-block">
								<strong>{{ $errors->first('description') }}</strong>
							</span>
						@endif	
					</div>
				
					<div class='form-group'>
						<input type="file" name="productImage" id="fileToUpload" class = 'btn btn-default btn-file' multiple>
					</div> 
					
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								@php 
									 $path = '/uploads/product/image/'.$Products->productImage ; 
								@endphp
								
								<span class="info-box-icon2 ">
									@if($Products->image)
									<img src="{{URL::asset($path) }}" width="15%" id="userImgPreview" class="img-circle" alt=" image">
									@else
										No Image
									@endif
								</span>	
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
        </section>
        
	</div>

	<script>
		$(function() {
			CKEDITOR.replace('description321');
			$(".textarea").wysihtml5();
		});
		
		$("#signupImgUpload").change(function() {
			readURL(this);
		});
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#userImgPreview').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>

	<script>
		$(function () {
			$('.datepicker').datepicker({
				autoclose: true
			});
			$('.datepicker1').datepicker({
				autoclose: true
			});
		});
	</script>

	<script>
	$(document).ready(function(){
		
		getCategory($('#cat_id').val());
		
		$('#category_id').change(function(){
			getCategory($(this).val());
		})
		function getCategory(cat){
			$.ajax({			
				url: '/get-sub-category-list',			
				type: 'POST',			
				dataType: 'json',			
				data: {			
					category_id: cat,
					_token: function() {
						return $("input[name='_token']").val();
					},
				},
				beforeSend: function() {
					$(".bodypageloader").show();
				},
				success: function(response) {
					$(".bodypageloader").hide();
					$('#sub_category_id').html('');
					$('#sub_category_id').append('<option value="">Sub Category</option>');
					if(response != ''){
						$.each(response, function (i, item) {
							$('#sub_category_id').append($('<option>', { 
								value: item.sub_category_id,
								id:'subcatid_'+item.sub_category_id,
								text : item.name
							}));
						});
						
						$('#subcatid_'+$('#sub_cat_id').val()).attr('selected','true');
					}else{
						$('#sub_category_id').append('<option value="">No Eligible Sub Category</option>');
					}
					$('#sub-category-div').css('display','block');
				},
				error:function(err) {
					$(".bodypageloader").hide();
				}
			}); 
		}
	});
	</script>
  
@endsection
