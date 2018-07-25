    
	
	<form role="form" action="{{route('admin.order-list')}}" method="get">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Search :</label>
					<input value="{{$params->s}}" class="form-control" type="text" name="s" autocomplete="off" placeholder="search by user name Or email ..." >
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
