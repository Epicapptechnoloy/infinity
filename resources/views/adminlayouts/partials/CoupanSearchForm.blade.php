<form role="form" action="{{route('admin.coupan-list')}}" method="get">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Filter by Discounts Or Offers Code :</label>
				<input value="{{$params->s}}" class="form-control" type="text" name="s" placeholder="Filter by Discounts Or Offers Code ..." >
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
			  <label>Status :</label>               
				<select   name="status" class="form-control" >
				<option value="" >Select Status</option>
				<option value="1" @if ($params->status==1) selected="selected" @endif >Active</option>
				<option value="2"  @if ($params->status==2) selected="selected" @endif>Inactive</option>          
				</select>                          
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>                      
				<span class="input-group-btn">
					<button type="submit" class="btn btn-info btn-flat">Go!</button>
				</span>
			</div>
		</div>
	</div>
</form>
           
