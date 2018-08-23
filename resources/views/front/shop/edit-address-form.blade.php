
		
		<form  role="form"  name="editaddressBookForm"  id="editaddressBookForm" method="POST" action="{{ route('editAddressBook') }}" novalidate="novalidate">
		{{ csrf_field() }} 
			<div class="inputsecHolder editaddressHolder" >  
				<aside class="inpHolder">
					<div class="formFieldLblArea">
						<div class="row">
							<div class="col-md-6 respnsiveinput"> 
								<input type="text"  id="first_name" placeholder="First Name"  name="first_name" value="{{ isset($billingAddress->first_name)?$billingAddress->first_name:''}}">
								
									<input type="hidden" autocomplete="off" id="address_id" name="address_id" placeholder="Full Name" value="{{ isset($billingAddress->address_id)?$billingAddress->address_id:''}}"/> 
									
								<p class="error-msg tipMsg pfirst_name" style="display: none;"></p>
							</div>
							<div class="col-md-6"> 
								<input type="text"  id="last_name" placeholder="Last Name"  name="last_name" value="{{ isset($billingAddress->last_name)?$billingAddress->last_name:''}}">
								<p class="error-msg tipMsg plast_name" style="display: none;"></p>
							</div> 	 
						</div>
					</div> 
				</aside> 
				
				<div class="clearfix"></div>							
						
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="address" name="address"  placeholder="Address Line 1 *" value="{{ isset($billingAddress->address)?$billingAddress->address:''}}" >
						<p class="error-msg tipMsg paddress" style="display: none;"></p>
					</div> 
				</aside>
				
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="address2" name="address2" placeholder="Address Line 2 *" value="{{ isset($billingAddress->address1)?$billingAddress->address2:''}}">
						<p class="error-msg tipMsg paddress2" style="display: none;"></p>
					</div> 
				</aside>
				
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="Landmark" name="landmark" placeholder="Landmark" value="{{ isset($billingAddress->address2)?$billingAddress->address2:''}}">
						<p class="error-msg tipMsg plandmark" style="display: none;"></p>
					</div> 
				</aside>

				<aside class="inpHolder">
					<div class="formFieldLblArea">
						<div class="row">
							<div class="col-md-6 respnsiveinput"> 
								<input type="text"  id="city"  name="city"  value="{{ isset($billingAddress->city)?$billingAddress->city:''}}" placeholder="City / District *"  >
								<p class="error-msg tipMsg pcity" style="display: none;"></p>
							</div>
							<div class="col-md-6"> 
								<input type="text"  id="postal_code"  name="postal_code"  value="{{ isset($billingAddress->zip)?$billingAddress->zip:''}}" placeholder="Postal Code *"  >
								<p class="error-msg tipMsg ppostal_code" style="display: none;"></p>
							</div> 	 
						</div>
					</div> 
				</aside> 

				<aside class="inpHolder">
					<div class="formFieldLblArea">
					
						<div class="row">
							<div class="col-md-6 respnsiveinput"> 
								<select class="form-control input-bg-black custom-input" name="country_id" id="country_id" >
								 <option value="">Select Country</option>						
									@foreach($countries as $k => $c)
										@php $sel = '' @endphp
										@if(isset($billingAddress->country_id) && $c->country_id == $billingAddress->country_id)
											@php $sel = 'selected = "selected"' @endphp
										@endif	
										<option value="{{ $c->country_id }}" {{ $sel }}>{{ $c->country_name }}</option>
									@endforeach
								</select>
							</div>
							<p class="error-msg tipMsg pcountry_id" style="display:none;"></p>
							
							<div class="col-md-6"> 
								<select class="form-control input-bg-black custom-input" name="state_id" id="state_id" >
									<option value="">Select State</option>
										@foreach($states as $k => $s)
											@php $sel = '' @endphp
											@if(isset($billingAddress->state_id) && $s->id == $billingAddress->state_id)
												@php $sel = 'selected = "selected"' @endphp
											@endif	
											<option value="{{ $s->id }}" {{ $sel }}>{{ $s->name }}</option>
										@endforeach
									
								</select>
							</div> 
							<p class="error-msg tipMsg pstate_id" style="display:none;"></p>
						</div>
					</div> 
				</aside> 	 	

				<aside class="inpHolder">
					<div class="formFieldLblArea contactprefix"> 
						<input type="text"  id="number" name="number" value="{{ isset($billingAddress->phone)?$billingAddress->phone:''}}" placeholder="Mobile Number*">
						<p class="error-msg tipMsg pnumber" style="display:none;"></p>
					</div> 
				</aside> 
				
				<div class="form-check" style="text-align:left;">
					<label class="form-check-label" style="display: block;width: 100%;"><input type="checkbox" name="is_default" class="form-check-input"> 		Make this my default address
					</label>
				</div>
				<input type="hidden" class="J_addressId" name=" " value="">     				
				<div class="modal-footer">
					<div class="row">
						<div  class="col-md-6 col-6">
							<button type="button" class="btn btn-secondary btn-block  J_editAddCancel close_modal" data-dismiss="modal">Cancel</button>
						</div> 
						<div  class="col-md-6 col-6">
							<button  type="button" class="btn btn-red btn-block" data-default="0" id="updateUserAddressBook">Save</button>
						</div>
					</div>
				</div>											
				 
			</div> 		
		</form>  

  <script>
$(document).ready(function(){
	
	$('#country_id').change(function(){				
		var country_id = $(this).val();		
		$.ajax({			
			url: '/get-state-list',			
			type: 'GET',			
			dataType: 'json',			
			data: {			
				country_id: country_id			
			},	
			beforeSend: function() {
				$(".bodypageloader").show();
			},
			success: function(response) {
				$(".bodypageloader").hide();
				console.log(response); 
				$('#state_id').html('');
				$('#state_id').append('<option value="state">State</option>');
				if(response != ''){
					$.each(response, function (i, item) {
						$('#state_id').append($('<option>', { 
							value: item.id,
							text : item.name 
						}));
					});
				}else{
					$('#state_id').append('<option value="state">No Eligible State</option>');
				}			
			},
			error:function(err) {
				$(".bodypageloader").hide();
			}
		});	
	});
	
	$.fn.updateAddressInformation = function(){
		$(".editaddressHolder").prepend('<div class="bodypageloader"></div>');
		//$(".bodypageloader").show();
		$(".error-msg").hide();
		$.ajax({
			url: JS_args.BASE_URL+'/edit-address-book',
			dataType: 'json',
			data: $("#editaddressBookForm").serialize(),
			method: 'post'						
		}).done(function (response) { 
			$(".bodypageloader").hide();
			
			if(response.success){ 
				
				var adress_var ="";
				adress_var +="<span class='font-bold'>"+response.data.first_name+" "+response.data.last_name+"</span>";
				adress_var += "<span><br>"+response.data.phone+"</span>";
				adress_var += "<span><br>"+response.data.address1+"</span>";
				adress_var += "<span><br>"+response.data.address2+"</span>";
				adress_var += "<span><br>"+response.data.city+"</span>";
				adress_var += "<span><br>"+"Mobile:"+"<span class='font-bold'>"+response.data.phone+"</span></span>";
				adress_var += "<br>";
				adress_var += "<span class='btn  btn-secondary  btn-sm text-uppercase' 'mt10'><a class='EditAddress' href='javascript:void(0);'  data-id='"+response.data.address_id+"' id='EditAddress'><span class='J_editAdd'>Edit</span></a></span>";
				
				adress_var += "<span class='btn  btn-secondary  btn-sm text-uppercase' 'mt10'><a class='DeleteAddressBook' href='javascript:void(0);'  data-id='"+response.data.address_id+"'  title='Delete Address' data-toggle='modal' data-target='#deleteAddressModal'><span class='J_delAdd'>Remove</span></a></span>";
				
				//adress_var += "</div>";
				
				
				$('#address_div_id_'+response.data.address_id).html(adress_var);
				//console.log($('#address_div_id_'+response.data.address_id).html(adress_var));
				console.log(adress_var);
				
				$('.close_modal').click();
				
			}	
		}).fail(function () {	
			$(".bodypageloader").hide();
			$.fn.alertPopup("Error", "Oops !", "OK");
		});
	}
	
	$("#userBillingInfoForm #country").on("change", function(){
		$.fn.getStatesByname($(this), $("#userBillingInfoForm #state"));
	});
	
	$("#updateUserAddressBook").on("click", function(){
		$.fn.updateAddressInformation();
	});

});	

    </script>