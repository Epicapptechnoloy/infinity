@extends('layouts.master')

@section('content')
	

<!-- REGISTRATION START HERE -->
<div class="content viewContainer successView sldrfullpge">
    <div class="container"> 
	    <div class="row">
			<div class="col-md-12">
			   <h1>Success!</h1>
			</div>
			
		    <div class="successImg">
			    <img src="{{ URL::asset('/images/Successicon.png') }}" alt="" />
			</div>
			<div class="col-md-12">
			   <p>Dear User</p>
			   <span>{!!Session::get('message')!!}</a></span>
			  
			</div>

		</div>
   </div>

	</div>
<!-- REGISTRATION END HERE -->

@endsection

