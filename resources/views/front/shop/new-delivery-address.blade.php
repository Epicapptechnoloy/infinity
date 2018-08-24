<!-- LOGIN MODEL --> 
<div class="modal-content"> 

<div class="loginHolder" style="margin-top:50%;"> 
	<section  class="signinHolder addressHolder">
	<div data-v-9b1377ca="" class="modal-header"><h5 data-v-9b1377ca="">Add New Address</h5> </div>
		<button type="button" class="close close_custom" data-dismiss="modal">&times;</button> 	
		
		<form  class="userBillingInfoFormfrm" role="form"  name="addressBookForm"  id="addressBookForm" method="POST" action="{{ route('saveAddressBook') }}" novalidate="novalidate">
		{{ csrf_field() }} 
			<div class="inputsecHolder" >  
				<aside class="inpHolder">
					<div class="formFieldLblArea">
						<div class="row">
							<div class="col-md-6 respnsiveinput"> 
								<input type="text"  id="first_name" placeholder="First Name"  name="first_name">
								<p class="error-msg tipMsg pfirst_name" style="display: none;"></p>
							</div>
							<div class="col-md-6"> 
								<input type="text"  id="last_name" placeholder="Last Name"  name="last_name">
								<p class="error-msg tipMsg plast_name" style="display: none;"></p>
							</div> 	 
						</div>
					</div> 
				</aside> 
				
				<div class="clearfix"></div>							
						
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="address" name="address"  placeholder="Address Line 1 *" >
						<p class="error-msg tipMsg paddress" style="display: none;"></p>
					</div> 
				</aside>
				
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="address2" name="address2" placeholder="Address Line 2 *">
						<p class="error-msg tipMsg paddress2" style="display: none;"></p>
					</div> 
				</aside>
				
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="Landmark" name="landmark" placeholder="Landmark">
						<p class="error-msg tipMsg plandmark" style="display: none;"></p>
					</div> 
				</aside>

				<aside class="inpHolder">
					<div class="formFieldLblArea">
						<div class="row">
							<div class="col-md-6 respnsiveinput"> 
								<input type="text"  id="city"  name="city" placeholder="City / District *"  >
								<p class="error-msg tipMsg pcity" style="display: none;"></p>
							</div>
							<div class="col-md-6"> 
								<input type="text"  id="postal_code"  name="postal_code" placeholder="Postal Code *"  >
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
								  <option value="country">Select Country</option>
									@foreach($countries as $country)
										<option value="{{$country->country_id}}" @if (old('country_id') == $country->country_id) selected="selected" @endif>{{$country->country_name}}</option>
									@endforeach
								</select>
							</div>
							<p class="error-msg tipMsg pcountry_id" style="display:none;"></p>
							
							<div class="col-md-6"> 
								<select class="form-control input-bg-black custom-input" name="state_id" id="state_id" >
										<option value="state">Select State</option>
										
								</select>
							</div> 
							<p class="error-msg tipMsg pstate_id" style="display:none;"></p>
						</div>
					</div> 
				</aside> 	 	

				<aside class="inpHolder">
					<div class="formFieldLblArea contactprefix"> 
						<input type="text"  id="number" name="number" placeholder="Mobile Number*">
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
						<div class="col-md-6 col-6">
							<button type="button" class="btn btn-secondary btn-block  J_editAddCancel close_modal" data-dismiss="modal">Cancel</button>
						</div> 
						<div class="col-md-6 col-6">
							<button type="button" class="btn btn-red btn-block" data-default="0" id="saveUserAddressBook">Save</button>
						</div>
					</div>
				</div>											
				
			</div> 		
		</form>  
</section>
	<!-- end regiter fram -->	  
</div>
</div>
<!-- END LOGIN MODEL -->

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
				$(".addressHolder").prepend('<div class="bodypageloader"></div>');
				//$(".bodypageloader").show();
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
	
	$.fn.saveAddressInformation = function(){
		$(".addressHolder").prepend('<div class="bodypageloader"></div>');
		//$(".bodypageloader").show();
		$(".error-msg").hide();
		$.ajax({
			url: JS_args.BASE_URL+'/save-address-book',
			dataType: 'json',
			data: $("#addressBookForm").serialize(),
			method: 'post'						
		}).done(function (response) { 
			$(".bodypageloader").hide();
			
			
			if(response.success){
				
				var adress_var ="<div  class='col-lg-6 col-md-12 col-12' id='delete_address__id_"+response.data.address_id+"'>";
				adress_var += "<div>";
				adress_var += "<div  class='addbx active'>";
				adress_var += "<div class='pull-left'>";
				adress_var += "<input type='radio' name='address' id='current_address__id_"+response.data.address_id+"' class='ckbox' value='"+response.data.address_id+"' checked>";
				adress_var += "<label>&nbsp; </label>";	
				adress_var += "</div>";	
				adress_var +="<div class='address' id='address_div_id_"+response.data.address_id+"'>";
				adress_var += "<span class='font-bold'>"+response.data.first_name+" "+response.data.last_name+"</span>";
				adress_var += "<span>";
				adress_var +="<br>"+response.data.phone+"</span>";
				adress_var += "<span>";
				adress_var +="<br>"+response.data.address1+"</span>";
				adress_var += "<span>";
				adress_var +="<br>"+response.data.address2+"</span>";
				adress_var += "<span>";
				adress_var +="<br>"+response.data.city+"</span>";
				adress_var += "<span>";
				adress_var +="<br>"+"Mobile:"+"<span class='font-bold'>"+response.data.phone+"</span></span>";
				adress_var += "<br>";
				adress_var += "<span class='btn  btn-secondary  btn-sm text-uppercase' 'mt10'><a class='EditAddress' href='javascript:void(0);'  data-id='"+response.data.address_id+"' id='EditAddress'><span class='J_editAdd'>Edit</span></a></span>";
				
				adress_var += "<span class='btn  btn-secondary  btn-sm text-uppercase' 'mt10'><a class='DeleteAddressBook' href='javascript:void(0);'  data-id='"+response.data.address_id+"'  title='Delete Address' data-toggle='modal' data-target='#deleteAddressModal'><span class='J_delAdd'>Remove</span></a></span>";
				adress_var += "</div>";
				adress_var += "</div>";
				adress_var += "</div>";
				adress_var += "</div>";
				
		
				$(".billingAddress11").append(adress_var);
				
				$('.close_modal').click();
			}else{
				if(response.status == 422){
					$.each(response.message, function(i, v){
						$('#addressBookForm p.p'+i).html(v).show();
					});
				}else{
					$.fn.alertPopup("Error", "Oops !", "OK");	
				}
			}		
		}).fail(function () {	
			$(".bodypageloader").hide();
			$.fn.alertPopup("Error", "Oops !", "OK");
		});
	}
	
	
	
	$("#saveUserAddressBook").on("click", function(){
		$.fn.saveAddressInformation();
	});

});	

    </script>