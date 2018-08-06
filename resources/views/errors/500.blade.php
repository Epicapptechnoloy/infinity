@extends('layouts.master')
@section('content')
<div id="content" class="product-area mar-top">
		<div class="container pd-15"> 
			<div class="well- bg-image-1-1">
			    <div class="bg-image-2-1">   
					<div class="row">
						<div class="col-md-12">
							
						</div>					
						<div class="col-md-12 col-sm-12 col-xs-12"> 
						
							<div id="error-404">   
								<h1>505</h1>
								 <img src="{{ URL::asset('/images/error.gif') }}" alt="" />
								
								<h2 class="page-title">Oops, Internal Error!</h2>
								<p>Try after some time. Go home by <a href="{{url('/')}}">Clicking here.</a></p>
							    
							</div> 
						</div> 
					</div>	  

		        </div> 
		    </div> 
		</div> 
	</div>
@endsection