<select class="form-control" name="city" id="city">
	<option value="0">Select Cities</option>
		@if($allcities != null)
			@foreach($allcities as $city)
				<option value="{{$city->id}}">{{$city->name}}</option>
			@endforeach
		@endif	
</select>
