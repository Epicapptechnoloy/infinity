@extends('layouts.master')
@section('content')
<!-- PAGE CONTENT --> 
	<section id="error-404">
		<div class="container">
			<div class="row text-center">
				<h1>404</h1>
				 <img src="{{ URL::asset('/images/error.gif') }}" alt="" />
				
				<h2 class="page-title">Oops, looks like a ghost!</h2>
				<p>The page you are looking for can't be found. Go home by <a href="{{url('/')}}">Clicking here.</a></p>
			</div>
		</div>
	</section> 
	<!-- END PAGE CONTENT -->
@endsection