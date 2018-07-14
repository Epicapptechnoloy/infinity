<select class="form-control" name="state" id="state" value="{{ old('state') }}">
	<option value="0">Select States</option>
		@if($allstates != null)
			@foreach($allstates as $state)
				<option value="{{$state->id}}">{{$state->name}}</option>
			@endforeach
		@endif	
</select>
