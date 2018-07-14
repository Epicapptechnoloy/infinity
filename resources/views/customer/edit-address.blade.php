@extends('layouts.master')

@section('content')
	
	<!-- PAGE CONTENT -->  
	<!--Route::GET('/edit-address','Customer\CustomerController@editAddressDetails');

	Route::POST('/edit-address/{id}','Customer\CustomerController@editAddressPostDetails');-->
	<!--public function editAddressDetails(Request $request)
    {
        $homeTitle = 'EditAddress';
		 $id=Auth::User()->id;
		$UserDetails= User::where('id',$id)->first();
		//dd($UserDetails);
		$Address = new Address; 
		$addressdata = $Address->getAddressDetails();
		//dd($addressdata);
		return view('customer.edit-address',compact('UserDetails','addressdata'));
        
    }
	 public function editAddressPostDetails(request $request,$id){
			
		$validation = Validator::make($request->all(), [            
            'name' 	=> 'required',
            'number' 	=> 'required',
            'address' 	=> 'required',
            'landmark' 	=> 'required',
            'country' 	=> 'required',
            'state' 	=> 'required',
            'city' 		=> 'required',
            'postcode' 	=> 'required',
        ]);              
       
		if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }else{
			try {
				
				$Address = Address::where('id',$id)->first();
				//dd($Address);
				$Address->name = $request->name;
				$Address->number = $request->number;
				$Address->address = $request->address;
				$Address->landmark = $request->landmark;
				$Address->country_id = $request->country;
				$Address->state_id = $request->state;
				$Address->city = $request->city;
				$Address->postcode = $request->postcode;
				
				$User->Update();
				
				DB::commit(); 
				 $request->session()->flash('alert-success', 'user Updated successfully!');
				return redirect()->route("user-details");
			}catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
                
            } 
		}
    } 
	-->
	<div class="main-container col2-left-layout">
		<div class="main">  
			<div class="container pd-15">
				<div class="row">
					<div class="my-account" id="address-form">
						<div class="page-title">
							<h1>EDIT ADDRESS</h1>
						</div>
		
							<form action="address" method="post" >
									{{ csrf_field() }}
								
								@if(!empty($addressdata))
								@foreach($addressdata as $adrdata)
								
								
								<input type="hidden" name="id" value="{{$adrdata->id}}">
									<div class="fieldset">
										
										<h2 class="legend">Edit Address</h2>
										<ul class="form-list">
											<li class="fields">
												<div class="customer-name-middlename">
													<div class="field name-firstname">
														<div class="input_head_2">
															<div class="input-box_2">
																<input type="text" name="name" value="{{$adrdata->name}} " title="Name" maxlength="255" class="input-text required-entry">
																<label for="firstname" class="required"> Name</label>
															</div>
														</div>
													</div>
													<div class="field name-firstname">
														<div class="input_head_2">
															<div class="input-box_2">
																<input type="text" name="number" value="{{$adrdata->number}} " title="Number" maxlength="255" class="input-text required-entry">
																<label for="number" class="required">Phone Number</label>
																
															</div>
														</div>
													</div>
													
													<div style="clear: both;"></div>
												</div>
											</li>
											
										</ul>
									</div>
									<div class="fieldset">
										<h2 class="legend">Address</h2>
										<ul class="form-list">
											<li class="wide">
												<div class="input_head_2">
													<div class="input-box_2">
														<input type="text" name="address" value="{{$adrdata->address}}" title="Street Address"  class="input-text  required-entry">
														<label for="street_1" class="required cng_color"> Street Address</label>
													</div>
												</div>
												<div class="input_head_2">
													<div class="input-box_2">
														<input type="text" name="landmark" value="{{$adrdata->landmark}}" title="Street Address"  class="input-text  required-entry">
														<label for="street_1" class="required cng_color"> Landmark(Optional)</label>
														
													</div>
												</div>
											</li>
											<li class="fields">
												
												<div class="field">
													<label for="country" class="required static_p"> Country</label>
													<div class="input-box_2 ">
														<select name="country" id="country_id" class="validate-select form-control" title="Country">
															<option value="">Select Country</option>
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>
															<option value="AL">Albania</option>
															<option value="DZ">Algeria</option>
															<option value="AS">American Samoa</option>
															<option value="AD">Andorra</option>
															<option value="AO">Angola</option>
															<option value="AI">Anguilla</option>
															<option value="AQ">Antarctica</option>
															<option value="AG">Antigua and Barbuda</option>
															<option value="AR">Argentina</option>
															<option value="AM">Armenia</option>
															<option value="AW">Aruba</option>
															<option value="AU">Australia</option>
															<option value="AT">Austria</option>
															<option value="AZ">Azerbaijan</option>
															<option value="BS">Bahamas</option>
															<option value="BH">Bahrain</option>
															<option value="BD">Bangladesh</option>
															<option value="BB">Barbados</option>
															<option value="BY">Belarus</option>
															<option value="BE">Belgium</option>
															<option value="BZ">Belize</option>
															<option value="BJ">Benin</option>
															<option value="BM">Bermuda</option>
															<option value="BT">Bhutan</option>
															<option value="BO">Bolivia</option>
															<option value="BA">Bosnia and Herzegovina</option>
															<option value="BW">Botswana</option>
															<option value="BV">Bouvet Island</option>
															<option value="BR">Brazil</option>
															<option value="IO">British Indian Ocean Territory</option>
															<option value="VG">British Virgin Islands</option>
															<option value="BN">Brunei</option>
															<option value="BG">Bulgaria</option>
															<option value="BF">Burkina Faso</option>
															<option value="BI">Burundi</option>
															<option value="KH">Cambodia</option>
															<option value="CM">Cameroon</option>
															<option value="CA">Canada</option>
															<option value="CV">Cape Verde</option>
															<option value="KY">Cayman Islands</option>
															<option value="CF">Central African Republic</option>
															<option value="TD">Chad</option>
															<option value="CL">Chile</option>
															<option value="CN">China</option>
															<option value="CX">Christmas Island</option>
															<option value="CC">Cocos (Keeling) Islands</option>
															<option value="CO">Colombia</option>
															<option value="KM">Comoros</option>
															<option value="CG">Congo - Brazzaville</option>
															<option value="CD">Congo - Kinshasa</option>
															<option value="CK">Cook Islands</option>
															<option value="CR">Costa Rica</option>
															<option value="CI">Côte d’Ivoire</option>
															<option value="HR">Croatia</option>
															<option value="CU">Cuba</option>
															<option value="CY">Cyprus</option>
															<option value="CZ">Czech Republic</option>
															<option value="DK">Denmark</option>
															<option value="DJ">Djibouti</option>
															<option value="DM">Dominica</option>
															<option value="DO">Dominican Republic</option>
															<option value="EC">Ecuador</option>
															<option value="EG">Egypt</option>
															<option value="SV">El Salvador</option>
															<option value="GQ">Equatorial Guinea</option>
															<option value="ER">Eritrea</option>
															<option value="EE">Estonia</option>
															<option value="ET">Ethiopia</option>
															<option value="FK">Falkland Islands</option>
															<option value="FO">Faroe Islands</option>
															<option value="FJ">Fiji</option>
															<option value="FI">Finland</option>
															<option value="FR">France</option>
															<option value="GF">French Guiana</option>
															<option value="PF">French Polynesia</option>
															<option value="TF">French Southern Territories</option>
															<option value="GA">Gabon</option>
															<option value="GM">Gambia</option>
															<option value="GE">Georgia</option>
															<option value="DE">Germany</option>
															<option value="GH">Ghana</option>
															<option value="GI">Gibraltar</option>
															<option value="GR">Greece</option>
															<option value="GL">Greenland</option>
															<option value="GD">Grenada</option>
															<option value="GP">Guadeloupe</option>
															<option value="GU">Guam</option>
															<option value="GT">Guatemala</option>
															<option value="GG">Guernsey</option>
															<option value="GN">Guinea</option>
															<option value="GW">Guinea-Bissau</option>
															<option value="GY">Guyana</option>
															<option value="HT">Haiti</option>
															<option value="HM">Heard &amp; McDonald Islands</option>
															<option value="HN">Honduras</option>
															<option value="HK">Hong Kong SAR China</option>
															<option value="HU">Hungary</option>
															<option value="IS">Iceland</option>
															<option value="IN">India</option>
															<option value="ID">Indonesia</option>
															<option value="IR">Iran</option>
															<option value="IQ">Iraq</option>
															<option value="IE">Ireland</option>
															<option value="IM">Isle of Man</option>
															<option value="IL">Israel</option>
															<option value="IT">Italy</option>
															<option value="JM">Jamaica</option>
															<option value="JP">Japan</option>
															<option value="JE">Jersey</option>
															<option value="JO">Jordan</option>
															<option value="KZ">Kazakhstan</option>
															<option value="KE">Kenya</option>
															<option value="KI">Kiribati</option>
															<option value="KW">Kuwait</option>
															<option value="KG">Kyrgyzstan</option>
															<option value="LA">Laos</option>
															<option value="LV">Latvia</option>
															<option value="LB">Lebanon</option>
															<option value="LS">Lesotho</option>
															<option value="LR">Liberia</option>
															<option value="LY">Libya</option>
															<option value="LI">Liechtenstein</option>
															<option value="LT">Lithuania</option>
															<option value="LU">Luxembourg</option>
															<option value="MO">Macau SAR China</option>
															<option value="MK">Macedonia</option>
															<option value="MG">Madagascar</option>
															<option value="MW">Malawi</option>
															<option value="MY">Malaysia</option>
															<option value="MV">Maldives</option>
															<option value="ML">Mali</option>
															<option value="MT">Malta</option>
															<option value="MH">Marshall Islands</option>
															<option value="MQ">Martinique</option>
															<option value="MR">Mauritania</option>
															<option value="MU">Mauritius</option>
															<option value="YT">Mayotte</option>
															<option value="MX">Mexico</option>
															<option value="FM">Micronesia</option>
															<option value="MD">Moldova</option>
															<option value="MC">Monaco</option>
															<option value="MN">Mongolia</option>
															<option value="ME">Montenegro</option>
															<option value="MS">Montserrat</option>
															<option value="MA">Morocco</option>
															<option value="MZ">Mozambique</option>
															<option value="MM">Myanmar (Burma)</option>
															<option value="NA">Namibia</option>
															<option value="NR">Nauru</option>
															<option value="NP">Nepal</option>
															<option value="NL">Netherlands</option>
															<option value="AN">Netherlands Antilles</option>
															<option value="NC">New Caledonia</option>
															<option value="NZ">New Zealand</option>
															<option value="NI">Nicaragua</option>
															<option value="NE">Niger</option>
															<option value="NG">Nigeria</option>
															<option value="NU">Niue</option>
															<option value="NF">Norfolk Island</option>
															<option value="MP">Northern Mariana Islands</option>
															<option value="KP">North Korea</option>
															<option value="NO">Norway</option>
															<option value="OM">Oman</option>
															<option value="PK">Pakistan</option>
															<option value="PW">Palau</option>
															<option value="PS">Palestinian Territories</option>
															<option value="PA">Panama</option>
															<option value="PG">Papua New Guinea</option>
															<option value="PY">Paraguay</option>
															<option value="PE">Peru</option>
															<option value="PH">Philippines</option>
															<option value="PN">Pitcairn Islands</option>
															<option value="PL">Poland</option>
															<option value="PT">Portugal</option>
															<option value="PR">Puerto Rico</option>
															<option value="QA">Qatar</option>
															<option value="RE">Réunion</option>
															<option value="RO">Romania</option>
															<option value="RU">Russia</option>
															<option value="RW">Rwanda</option>
															<option value="BL">Saint Barthélemy</option>
															<option value="SH">Saint Helena</option>
															<option value="KN">Saint Kitts and Nevis</option>
															<option value="LC">Saint Lucia</option>
															<option value="MF">Saint Martin</option>
															<option value="PM">Saint Pierre and Miquelon</option>
															<option value="WS">Samoa</option>
															<option value="SM">San Marino</option>
															<option value="ST">São Tomé and Príncipe</option>
															<option value="SA">Saudi Arabia</option>
															<option value="SN">Senegal</option>
															<option value="RS">Serbia</option>
															<option value="SC">Seychelles</option>
															<option value="SL">Sierra Leone</option>
															<option value="SG">Singapore</option>
															<option value="SK">Slovakia</option>
															<option value="SI">Slovenia</option>
															<option value="SB">Solomon Islands</option>
															<option value="SO">Somalia</option>
															<option value="ZA">South Africa</option>
															<option value="GS">South Georgia &amp; South Sandwich Islands</option>
															<option value="KR">South Korea</option>
															<option value="ES">Spain</option>
															<option value="LK">Sri Lanka</option>
															<option value="VC">St. Vincent &amp; Grenadines</option>
															<option value="SD">Sudan</option>
															<option value="SR">Suriname</option>
															<option value="SJ">Svalbard and Jan Mayen</option>
															<option value="SZ">Swaziland</option>
															<option value="SE">Sweden</option>
															<option value="CH">Switzerland</option>
															<option value="SY">Syria</option>
															<option value="TW">Taiwan</option>
															<option value="TJ">Tajikistan</option>
															<option value="TZ">Tanzania</option>
															<option value="TH">Thailand</option>
															<option value="TL">Timor-Leste</option>
															<option value="TG">Togo</option>
															<option value="TK">Tokelau</option>
															<option value="TO">Tonga</option>
															<option value="TT">Trinidad and Tobago</option>
															<option value="TN">Tunisia</option>
															<option value="TR">Turkey</option>
															<option value="TM">Turkmenistan</option>
															<option value="TC">Turks and Caicos Islands</option>
															<option value="TV">Tuvalu</option>
															<option value="UG">Uganda</option>
															<option value="UA">Ukraine</option>
															<option value="AE">United Arab Emirates</option>
															<option value="GB">United Kingdom</option>
															<option value="US">United States</option>
															<option value="UY">Uruguay</option>
															<option value="UM">U.S. Outlying Islands</option>
															<option value="VI">U.S. Virgin Islands</option>
															<option value="UZ">Uzbekistan</option>
															<option value="VU">Vanuatu</option>
															<option value="VA">Vatican City</option>
															<option value="VE">Venezuela</option>
															<option value="VN">Vietnam</option>
															<option value="WF">Wallis and Futuna</option>
															<option value="EH">Western Sahara</option>
															<option value="YE">Yemen</option>
															<option value="ZM">Zambia</option>
															<option value="ZW">Zimbabwe</option>
														</select>
													</div>
														
												</div>
											</li>
											<li class="fields">
												
												<div class="field ">
													<label for="state_id" class="required static_p"> State</label>
													<div class="input-box_2">
														<select id="state_id" name="state" title="State" class="validate-select required-entry form-control" style="" defaultvalue="0">
															<option value="">Select state </option>
															<option value="1">Alabama</option>
															<option value="2">Alaska</option>
															<option value="3">American Samoa</option>
															<option value="4">Arizona</option>
															<option value="5">Arkansas</option>
															<option value="6">Armed Forces Africa</option>
															<option value="7">Armed Forces Americas</option>
															<option value="8">Armed Forces Canada</option>
															<option value="9">Armed Forces Europe</option>
															<option value="10">Armed Forces Middle East</option>
															<option value="11">Armed Forces Pacific</option>
															<option value="12">California</option>
															<option value="13">Colorado</option>
															<option value="14">Connecticut</option>
															<option value="15">Delaware</option>
															<option value="16">District of Columbia</option>
															<option value="17">Federated States Of Micronesia</option>
															<option value="18">Florida</option>
															<option value="19">Georgia</option>
															<option value="20">Guam</option>
															<option value="21">Hawaii</option>
															<option value="22">Idaho</option>
															<option value="23">Illinois</option>
															<option value="24">Indiana</option>
															<option value="25">Iowa</option>
															<option value="26">Kansas</option>
															<option value="27">Kentucky</option>
															<option value="28">Louisiana</option>
															<option value="29">Maine</option>
															<option value="30">Marshall Islands</option>
															<option value="31">Maryland</option>
															<option value="32">Massachusetts</option>
															<option value="33">Michigan</option>
															<option value="34">Minnesota</option>
															<option value="35">Mississippi</option>
															<option value="36">Missouri</option>
															<option value="37">Montana</option>
															<option value="38">Nebraska</option>
															<option value="39">Nevada</option>
															<option value="40">New Hampshire</option>
															<option value="41">New Jersey</option>
															<option value="42">New Mexico</option>
															<option value="43">New York</option>
															<option value="44">North Carolina</option>
															<option value="45">North Dakota</option>
															<option value="46">Northern Mariana Islands</option>
															<option value="47">Ohio</option>
															<option value="48">Oklahoma</option>
															<option value="49">Oregon</option>
															<option value="50">Palau</option>
															<option value="51">Pennsylvania</option>
															<option value="52">Puerto Rico</option>
															<option value="53">Rhode Island</option>
															<option value="54">South Carolina</option>
															<option value="55">South Dakota</option>
															<option value="56">Tennessee</option>
															<option value="57">Texas</option>
															<option value="58">Utah</option>
															<option value="59">Uttar Pradesh</option>
															<option value="60">Virgin Islands</option>
															<option value="61">Virginia</option>
															<option value="62">Washington</option>
															<option value="63">West Virginia</option>
															<option value="64">Wisconsin</option>
															<option value="65">Wyoming</option>
														</select> 
														@if ($errors->has('state'))
														<span class="help-block">
															<strong>{{ $errors->first('state') }}</strong>
														</span>
														@endif
														
													</div>
												</div>
												<div class="field">
													<div class="input_head_2 ">
														<div class="input-box_2">
															<input type="text" name="city" value="{{ $adrdata->city }}" title="City" class="input-text  required-entry" id="city"> 
															<label for="city" class="required cng_color"> City</label>
															
														</div>
													</div>
												</div>
												<div class="field">
													
													<div class="input_head_2">
														<div class="input-box_2">
															<input type="text" name="postcode" value="{{$adrdata->postcode}}" title="Zip/Postal Code"  class="input-text validate-zip-international  required-entry">
															<label for="zip" class="required cng_color"> Postal Code</label>
															
														</div>
													</div>
												</div>
											</li>
											
											
										</ul>
									</div>
									<div class="buttons-set">
										
										<p class="back-link"><a href="javascript:void(0);"><small>« </small>Back</a></p>
										<button data-action="save-customer-address" type="submit" title="Save Address" class="button_submit"><span><span>Save Address</span></span> </button>
										</button>
									</div>
								@endforeach
								@endif	
							</form>
	
						</div>
					
					</div>
				</div>
			</div>
		</div>
	
	
	
@endsection