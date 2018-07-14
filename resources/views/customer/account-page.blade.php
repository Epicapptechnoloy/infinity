@extends('layouts.master')

@section('content')
	
	<!-- PAGE CONTENT -->  
	
	<div class="main-container col2-left-layout">
		<div class="main">  
			<div class="container pd-15">
				<div class="row">
					<div class="col-left sidebar col-lg-3 col-md-3 col-sm-4 col-xs-12">
					    <div class="user_img">
						        <div class="img_profile">
								<img src="{{ asset('public/assets/front/images/avatar2.png') }}">
						        <!--<img src="img/no-user-image.png" alt=""/> -->
                                </div>
								<div class="name_user">
							        <span class="hello_msg"> Hello!</span>
							        <span> {{ ucfirst(Auth::user()->name) }} </span> 
								</div>	
						</diV>
						<div class="block block-account">
							<div class="block-title text-center">
								<strong><span>Account</span></strong>
							</div>
							<div class="block-content">
								<ul>
									<li class="current"><a class="acnt_das" href="javascript:void(0)">Account Dashboard</a></li>
									<li><a class="Account_info {{ Request::path() == '/account' ? 'active' : '' }}" href="account">Account Information</a></li>
									<li><a class="new_address {{ Request::path() == '/address' ? 'active' : '' }}" href="address"> Manage Addresses</a></li>
									<li><a href="my-order.html">My Orders</a></li>  
									<li><a href="javascript:void(0);">My Product Reviews</a></li>  
									<li><a href="wishlist.html">Wishlist</a></li> 
									<li><a href="javascript:void(0);">My Online Design</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-main col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<!-- Account Dashboard  -->
						<div id="Account_Dashboard" class="my-account"> 
							<div class="dashboard">
								<div class="page-title">
									<h1>My Dashboard</h1>
								</div>
								<div class="welcome-msg">
									<p class="hello"><strong>Hello, {{ ucfirst(Auth::user()->name) }}!</strong></p>
									<p class="about_acount">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
								</div>
								<div class="box-account box-info">
									<div class="page-title">
										<h1>Account Information</h1>
									</div>
									
									<div class="col2-set">
										<div class="col-1">
											<div class="box">
												
												<div class="box-content">
													<p>
														Name:  {{ 			ucfirst(Auth::user()->name) }}
														<br>Email Address:  {{ (Auth::user()->email) }}
														<br>Mobile Number:

														{{Auth::user()->number}}
														
													</p>
												</div>
											</div>
										</div>
										
									</div>
						<div id="info_actnt" class="my-account">
							<div class="page-title">
								<h1>EDIT ACCOUNT INFORMATION</h1>
							</div>
							<form action="#" method="#" >
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$UserDetails->id}}">
								<div class="fieldset">
									
									<h2 class="legend">Edit Account Information</h2>
									<ul class="form-list">
										<li class="fields">
											<div class="customer-name-middlename">
												<div class="field name-firstname">
													<div class="input_head_2">
														<div class="input-box_2">
															<input type="text" id="firstname" name="name" value="{{ $UserDetails->name }} " title="Name" maxlength="255" class="input-text required-entry" >
															
														</div>
													</div>
												</div>
												<div style="clear: both;"></div>
											</div>
										</li>
										<li class="wide">
											<div class="input_head_2">
												<div class="input-box_2">
													<input type="text" name="email" id="company" title="email" value="{{ $UserDetails->email }} " class="input-text form-control" disabled>
													
												</div>
											</div>
										</li> 
										<li class="control space_control">
											<input type="checkbox" name="change_password" class="click_pass align_"  value="1" onclick="setPasswordForm(this.checked)" title="Change Password" class="checkbox">
											<span for="change_password" class="position_change">Change Password</span>
										</li>										
									</ul>
									
								</div>
							</form>	
						</div>
						
						
								

							<!-- CHANGE PASSWORD --> 
						<div id="change_passwd" class="my-account">
							<div class="page-title">
								<h1>Change Password</h1>
							</div>
							<form method="post"  action="change-password">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$UserDetails->id}}">
								<div class="change_pass">	
									<ul class="form-list">
										<li class="wide">
											@if(session('success'))
												<div class="flash-message">
													<div class="alert alert-success">
														<p style="green"><b>{{session('success')}}</b></p>
													</div>
												</div>
												@endif
												@if (session('error'))
													<div class="flash-message">
														<div class="alert alert-danger">
															{{session('error')}}
														</div>
													</div>
												@endif	
											<div class="input_head_2  {{ $errors->has('old_password') ? ' has-error' : '' }}">
												<div class="input-box_2">
													<input type="password" name="old_password" id="old_password" value="" title="Street Address" class="input-text  required-entry" >
													<label for="street_1" class="required cng_color"> Current Password</label>
													@if ($errors->has('old_password'))
													<span class="help-block">
														<strong>{{ $errors->first('old_password') }}</strong>
													</span>
													@endif
													
													
												</div>
											</div>
											
											<div class="input_head_2 {{ $errors->has('password') ? ' has-error' : '' }}">
												<div class="input-box_2 ">
													<input type="password" name="password"id="password" value="" title="Street Address" class="input-text  required-entry">
													<label for="street_1" class="required cng_color"> New Password</label>
													@if ($errors->has('password'))
														<span class="help-block">
															<strong>{{ $errors->first('password') }}</strong>
														</span>
													@endif
												</div>
											</div>

											<div class="input_head_2 {{ $errors->has('password') ? ' has-error' : '' }}">
												<div class="input-box_2 ">
													<input type="password" name="password_confirmation" id="password_confirmation" value="" title="Street Address"  class="input-text  required-entry">
													<label for="street_1" class="required cng_color">Confirm Password </label>
												</div>
											</div>									
										</li>
									</ul>
									<button data-action="save-customer-address" type="submit" old_password="{{ $UserDetails->password }}" id="submit" class="button_submit"><span>Submit</span> </button>
								</div>							
							</form>		
						</div>
								</div>
							</div>
						</div>
						<!-- End Account Dashboard  -->
						
						<!-- Address Book -->
						<div class="my-account" id="address-form">
							<div class="page-title">
								<h1>Manage Addresses</h1>
							</div>
							<form action="address" method="post" >
								{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$UserDetails->id}}">
								<div class="fieldset">
									
									<h2 class="legend">Add New Address</h2>
									<ul class="form-list">
										<li class="fields">
											<div class="customer-name-middlename">
												<div class="field name-firstname">
													<div class="input_head_2 {{ $errors->has('name') ? ' has-error' : '' }}">
														<div class="input-box_2">
															<input type="text" name="name" value="{{ old('name') }} " title="Name" maxlength="255" class="input-text required-entry">
															<label for="firstname" class="required"> Name</label>
															@if ($errors->has('name'))
															<span class="help-block">
																<strong>{{ $errors->first('name') }}</strong>
															</span>
															@endif
														</div>
													</div>
												</div>
												<div class="field name-firstname">
													<div class="input_head_2 {{ $errors->has('number') ? ' has-error' : '' }}">
														<div class="input-box_2">
															<input type="text" name="number" value="{{ old('number') }} " title="Number" maxlength="255" class="input-text required-entry">
															<label for="number" class="required">Phone Number</label>
															@if ($errors->has('number'))
															<span class="help-block">
																<strong>{{ $errors->first('number') }}</strong>
															</span>
															@endif
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
											<div class="input_head_2 {{ $errors->has('address') ? ' has-error' : '' }}">
												<div class="input-box_2">
													<input type="text" name="address" value="{{ old('address') }}" title="Street Address"  class="input-text  required-entry">
													<label for="street_1" class="required cng_color"> Street Address</label>
													@if ($errors->has('address'))
													<span class="help-block">
														<strong>{{ $errors->first('address') }}</strong>
													</span>
													@endif
												</div>
											</div>
											<div class="input_head_2 {{ $errors->has('landmark') ? ' has-error' : '' }}">
												<div class="input-box_2">
													<input type="text" name="landmark" value="{{ old('landmark') }}" title="Street Address"  class="input-text  required-entry">
													<label for="street_1" class="required cng_color"> Landmark(Optional)</label>
													@if ($errors->has('landmark'))
													<span class="help-block">
														<strong>{{ $errors->first('landmark') }}</strong>
													</span>
													@endif
												</div>
											</div>
										</li>
										<li class="fields">
											
											<div class="field {{ $errors->has('country') ? ' has-error' : '' }}">
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
													@if ($errors->has('country'))
													<span class="help-block">
														<strong>{{ $errors->first('country') }}</strong>
													</span>
													@endif
											</div>
										</li>
										<li class="fields">
											
											<div class="field {{ $errors->has('state') ? ' has-error' : '' }}">
												<label for="state_id" class="required static_p"> State</label>@if ($errors->has('state_id'))
													<span class="help-block">
														<strong>{{ $errors->first('state_id') }}</strong>
													</span>
													@endif
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
												<div class="input_head_2 {{ $errors->has('city') ? ' has-error' : '' }}">
													<div class="input-box_2">
														<input type="text" name="city" value="{{ old('city') }}" title="City" class="input-text  required-entry" id="city"> 
														<label for="city" class="required cng_color"> City</label>
														@if ($errors->has('city'))
														<span class="help-block">
															<strong>{{ $errors->first('city') }}</strong>
														</span>
														@endif
													</div>
												</div>
											</div>
											<div class="field">
												
												<div class="input_head_2 {{ $errors->has('postcode') ? ' has-error' : '' }}">
													<div class="input-box_2">
														<input type="text" name="postcode" value="{{old('postcode')}}" title="Zip/Postal Code"  class="input-text validate-zip-international  required-entry">
														<label for="zip" class="required cng_color"> Postal Code</label>
														@if ($errors->has('postcode'))
														<span class="help-block">
															<strong>{{ $errors->first('postcode') }}</strong>
														</span>
														@endif
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
							</form>
						</div>
					<!--Edit Address Start Here-->
					
						<!--Edit Address End Here-->
						<div class="address_work">
								@if($addressdata)
									@foreach($addressdata as $data)
								<div class="main_address_holder"><p class="user_numb">	
									 <span>{{$data->name}}</span>
									<span class="space_left">{{$data->number}}</span> 
								</p>
								<p>
									<span class="adress_">
									<span>{{$data->id}}</span>
									<span>{{$data->address}}</span>
									<span>{{$data->landmark}}</span>
									<span>{{$data->country_id}}</span>
									<span>{{$data->state_id}}</span>
									<span>{{$data->city}}</span>
									<span>{{$data->postcode}}</span>
									
									</span>
								</p></div>
								@endforeach
								@endif
						</div>
											<!-- end address book -->
						
						
						<!-- ACCOUNT INFORMATION -->
						<!-- Address Book -->
						
						<!-- END CHANGE Password -->
						 
						<!-- END ACCOUNT INFORMATION -->
						
						<!-- My Order -->
						<div class="my-account">
							<div class="page-title">
								<h1>My Orders</h1>
							</div>
							<p>You have placed no orders.</p>
							<div class="buttons-set">
								<p class="back-link"><a href="javascript:void(0);"><small>« </small>Back</a></p>
							</div>
						</div>
						<!-- End My Order -->
						
						<!-- My Product Reviews -->
						<div class="my-account">
							<div class="page-title">
								<h1>MY PRODUCT REVIEWS</h1>
							</div>
							<p>You have submitted no reviews.</p>
							<div class="buttons-set">
								<p class="back-link"><a href="javascript:void(0);"><small>« </small>Back</a></p>
							</div>
						</div>		

                        <!-- Reviews rating -->
						<div class="reviewing_holder">
							<h4 class="reviewing">Orders you might be interested reviewing</h4>
							<div class="row">
								<div class="col-md-2">
								
									<div class="img_order">
										<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }}">
									</div>
								</div>
								<div class="col-md-8">
									<div class="rating_holder">
										<span> Lorem Ipsum is simply </span>
										<ul class="start_rating">
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Very Bad!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Bad!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Good!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Very Good!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Excellent!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											 
										</ul>
										<span class="rate_and"><a href="javascript:void(0);"> Rate and Review</a></span>
										 
									</div>	
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-2">
									<div class="img_order">
										<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }}">
									</div>
								</div>
								<div class="col-md-8">
									<div class="rating_holder">
										<span> Lorem Ipsum is simply </span>
										<ul class="start_rating">
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Very Bad!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Bad!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Good!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Very Good!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Excellent!"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											 
										</ul>
										<span class="rate_and"><a href="javascript:void(0);"> Rate and Review</a></span>
										 
									</div>	
								</div>
							</div>							
						</div>
						<!-- End My Product Reviews -->  
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#submit').click(function() {
				var old_password = $("#old_password").val();
				var password = $("#password").val();
				var password_confirmation = $("#password_confirmation").val();
				 
				$.ajax({
					type:'POST',
					data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": old_password,"id": password,"id": password_confirmation},
					url:'/change-password',
					success:function(data){
						var obj = JSON.parse(data);
						$('#old_password').val(obj.old_password);
						$('#password').val(obj.password);
						$('#password_confirmation').val(obj.password_confirmation);
						$('#message').html('Your password has been  changed successfully.');
						$('#message').css('color','green');
						$('#message-box').show();				
						setTimeout(function() {$("#message-box").hide('blind', {}, 500)}, 3000);
					}
				});
			});
		});
	</script>
	
				
@endsection