	@extends('layouts.master')

	@section('content')
	
	<!-- PAGE BANNER -->
	
    <section class="product-detail">
	    <div class="container pd-15">
			<div class="row">
			    <div class="col-md-12">
				    <ul class="breadcrumb">
                        <li> <i class="fa fa-home"></i> <a href="{{Url('home')}}">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="detail-row">
			<div class="container pd-15">
				<div class="detail-row">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="block-title-w mr_tp_bt">
							<h2 class="block-title">CHECKOUT</h2> 
							<span class="icon-title">
							<span></span>
							<i class="fa fa-star"></i>
							</span>
						</div>
					</div>
				</div>
				</div>
		    </div>
	    </div>
	</section>	
	<!-- /PAGE TITLE -->
 
	<!-- PAGE SECTION START -->
	<section>
	    <div class="checked_holder">
		    <div class="container">
			    <div class="row">
					<div class="col-md-8 pd-15"> 
						<!-- LOGIN START --> 							 
						<div id="click_to_slide" class="log-area">
							<h3 class="sign_up cng_background">
								<span class="number"> 1 </span>
								<span id="cng_color" class="log_or_sign">Login or Signup</span>
							</h3>
						</div> 
						<div id="slide_down" class="checkout-login">
							<div class="row clearfix">								
									<div class="col-md-6">								
										<form action="#" class="space_holder">
											<div class="input_head">
												<input type="text" required="">
												<label>Enter Your Email</label> 
											</div>
											<button class="btn btn-danger">CONTINUE</button>
										</form> 
									</div>  
									<div class="col-md-6">
										<div class="secure_log">
											<span>Advantages of our secure login</span>
											<ul> 
												<li><i class="fa fa-truck" aria-hidden="true"></i> Easily Track Orders, Hassle free Returns</li>
												<li><i class="fa fa-bell" aria-hidden="true"></i> Get Relevant Alerts and Recommendation</li>
												<li><i class="fa fa-star" aria-hidden="true"></i> Wishlist, Reviews, Ratings and more.</li> 
											</ul>
										</div> 
									</div> 
							</div> 
						</div>    
						<!-- LOGIN END -->	
						
						
					     <!-- delevery address -->
						<div id="click_to_slide" class="log-area">
							<h3  class="sign_up cng_background">
							<span class="number"> 2 </span>
							<span id="cng_color" class="log_or_sign">delevery address </span>
							</h3>
						</div> 
							<div id="slide_down" class="checkout-login">
								<div class="delevery_main">
									<div class="delevery_sub_main"> 
									    <input type="radio" class="radio_btn" checked="checked" value="male" name="adress"> 
										<ul>
											<li>Mohd Irfan</li>
											<li><a href="#">Home</a></li>
											<li>7055578764</li>
										</ul>
										<div class="edit"><button type="button" class="edit_addres">EDIT</button></div>
										<span class="address"> BETA 2 G-6 greater noida, Near Rampur, Gautam Buddha Nagar District, Uttar Pradesh </span>
										<span class="_code">201310</span>
										<button class="btn btn-success">Deliver Here</button> 
									</div> 
								</div>
							</div> 						 
						 
					     <!-- end delevery address -->
						 
						 <!-- add new addresss -->
							<div id="click_to_slide" class="log-area">
								<h3  class="sign_up cng_background">
								 <span class="new_add"> <i class="fa fa-plus-square" aria-hidden="true"></i></span>  
								<span id="cng_color" class="log_or_sign">Add a new address</span>
								</h3>
								<form>
									<div class="add_new_addresss">
										<input type="radio"  class="add_radio" checked="checked" value="male" name="adress"> 
										<span class="top_title_adress"> ADD A NEW ADDRESS</span>
										<button class="_2AkmmA _1KqHFH _1eFTEo" type="button"><svg class="svg_icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="-fgCFc"><g fill="none" fill-rule="evenodd"><path d="M0 0h16v16H0z"></path><path fill="#fff" d="M8 5.3a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 1 0 0-5.4zm6 2A6 6 0 0 0 8.7 2V.7H7.3V2A6 6 0 0 0 2 7.3H.7v1.4H2A6 6 0 0 0 7.3 14v1.3h1.4V14A6 6 0 0 0 14 8.7h1.3V7.3H14zm-6 5.4A4.7 4.7 0 0 1 3.3 8 4.7 4.7 0 0 1 8 3.3 4.7 4.7 0 0 1 12.7 8 4.7 4.7 0 0 1 8 12.7z"></path></g></svg>
										<span>Use my current location </span></button>
										<div class="row">
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Name</label>  
												</div> 
											</div>
											
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Phone Number</label>  
												</div> 
											</div>
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Pincode</label>  
												</div> 
											</div>
											
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Locality</label>  
												</div> 
											</div>	

											<div class="col-md-12 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Address (Area and Street)</label>  
												</div> 
											</div>

											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>City/District/Town</label>  
												</div> 
											</div>	
											<div class="col-md-6 pd_bottom"> 
												<div class="main_select_box">
													<div class="atate_title">State</div> 
													<select class="select_box">
														<option value="">--Select State--</option>
														<option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
														<option value="Andhra Pradesh">Andhra Pradesh</option>
														<option value="Arunachal Pradesh">Arunachal Pradesh</option>
														<option value="Assam">Assam</option>
														<option value="Bihar">Bihar</option>
														<option value="Chandigarh">Chandigarh</option>
														<option value="Chhattisgarh">Chhattisgarh</option>
														<option value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
														<option value="Daman and Diu">Daman and Diu</option>
														<option value="Delhi">Delhi</option>
														<option value="Goa">Goa</option>
														<option value="Gujarat">Gujarat</option>
														<option value="Haryana">Haryana</option>
														<option value="Himachal Pradesh">Himachal Pradesh</option>
														<option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
														<option value="Jharkhand">Jharkhand</option>
														<option value="Karnataka">Karnataka</option>
														<option value="Kerala">Kerala</option>
														<option value="Lakshadweep">Lakshadweep</option>
														<option value="Madhya Pradesh">Madhya Pradesh</option>
														<option value="Maharashtra">Maharashtra</option>
														<option value="Manipur">Manipur</option>
														<option value="Meghalaya">Meghalaya</option>
														<option value="Mizoram">Mizoram</option>
														<option value="Nagaland">Nagaland</option>
														<option value="Odisha">Odisha</option>
														<option value="Puducherry">Puducherry</option>
														<option value="Punjab">Punjab</option>
														<option value="Rajasthan">Rajasthan</option>
														<option value="Sikkim">Sikkim</option>
														<option value="Tamil Nadu">Tamil Nadu</option>
														<option value="Telangana">Telangana</option>
														<option value="Tripura">Tripura</option>
														<option value="Uttarakhand">Uttarakhand</option>
														<option value="Uttar Pradesh">Uttar Pradesh</option>
														<option value="West Bengal">West Bengal</option>
													</select> 
												</div> 	 
											</div>
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Landmark (Optional)</label>  
												</div> 
											</div>	
											<div class="col-md-6 pd_bottom"> 
												<div class="input-box"> 
													<input type="text" name="" required="">
													<label>Alternate Phone (Optional)</label>  
												</div> 
											</div>											
											<div class="col-md-12">
											    <div class="adress_type_holder">
												    <span class="type_add">Address Type</span>
												     <ul>
													    <li> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> Home (All day delivery)</li>
													    <li> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> Work (Delivery between 10 AM - 5 PM)</li>
													 </ul>
												</div>
												<div class="sve_cancel"> 
												    <button type="button" class="success">Save and Deliver Here</button>
												    <button type="button" class="cancel">Cancel</button>
												</div>
											</div>
										</div> 
									</div>
								</form>
							</div>  
						 <!-- add new addresss -->
						 
						 
						<!-- order summary -->
						<div id="click_to_slide" class="log-area">
							<h3 class="sign_up  cng_background">
							<span class="number"> 3 </span>
							<span class="log_or_sign">Order Summary</span>
							</h3>
							<div class="all_cart_holder">
								<div class="my_cart_holder"> 
									<div class="row mr_00"> 
										<div class="main_my_cart"> 
											<div class="col-md-2 pd-15">
												<div class="cart_img_holder">
													<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg')}}" alt="image">
													<div class="input-group mt-20">
														<span class="input-group-btn">
															<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> <span class="glyphicon glyphicon-minus"></span> </button>
														</span>
														<input name="quant[1]" class="input-number" value="1" type="text">
														<span class="input-group-btn">
															<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> <span class="glyphicon glyphicon-plus"></span> </button>
														</span> 
													</div>
												</div>  
											</div>
											<div class="col-md-6 pd-15">
												 <div class="remove_area">
													<h3>Lorem Ipsum is simply dummy text of the printing.</h3>
													<span class="sub_title">Lorem Ipsum</span>
													<span class="price_product"><i class="fa fa-inr" aria-hidden="true"></i> 0000</span>
													<ul class="move_remove">
														<li><a href="#">Move to wishlist </a></li>
														<li><a href="#"> Remove </a></li>
													</ul> 
												 </div>
											</div> 	
											<div class="col-md-4 pd-15">
												<div class="delevery_area">
													 <span class="delivery">Delivery in 2 Days, Thu: <i class="fa fa-inr" aria-hidden="true"></i> 40</span>
												</div>
											</div>
										</div>
									</div> 
									<div class="row mr_00"> 
										<div class="main_my_cart"> 
											<div class="col-md-2 pd-15">
												<div class="cart_img_holder">
													<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }}" alt="image">
													<div class="input-group mt-20">
														<span class="input-group-btn">
															<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> <span class="glyphicon glyphicon-minus"></span> </button>
														</span>
														<input name="quant[1]" class="input-number" value="1" type="text">
														<span class="input-group-btn">
															<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> <span class="glyphicon glyphicon-plus"></span> </button>
														</span> 
													</div>
												</div>  
											</div>
											<div class="col-md-6 pd-15">
												 <div class="remove_area">
													<h3>Lorem Ipsum is simply dummy text of the printing.</h3>
													<span class="sub_title">Lorem Ipsum</span>
													<span class="price_product"><i class="fa fa-inr" aria-hidden="true"></i> 0000</span>
													<ul class="move_remove">
														<li><a href="#">Move to wishlist </a></li>
														<li><a href="#"> Remove </a></li>
													</ul> 
												 </div>
											</div> 	
											<div class="col-md-4 pd-15">
												<div class="delevery_area">
													 <span class="delivery">Delivery in 2 Days, Thu: <i class="fa fa-inr" aria-hidden="true"></i> 40</span>
													  
												</div>
											</div>
										</div>
									</div> 
									<div class="bottom_continue">
										  <span class="both_hold">
											Order confirmation email will be sent to 
											<form class="inline_block"> 
												<input type="text" name="" placeholder="Enter your email ID" />
											</form>
										  </span>
										  <span class="BTN_CONTINUE">
											<button class="btn btn-info">CONTINUE</button>
										  </span>
									</div>  
								</div>  
							</div>	
						</div>	
						<!-- end order summary --> 
						
						<!-- Payment Options -->
						<div id="click_to_slide" class="log-area">
							<h3 class="sign_up  cng_background">
							<span class="number"> 4 </span>
							<span class="log_or_sign">Payment Options</span>
							</h3>
							
							<div class="payment_option_holder">
								<div class="payment_option">
									<span class="bank_state"> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress">State Bank of India Debit Card</span>
									<img src="{{ asset('public/assets/front/images/visa.png')}}" alt="" >
									<span>45xx xxxx xxxx 7206</span>
									
									<!-- onclick hide & show area -->
									<div class="cvv_area">
										<div class="input-box flt"> 
											<input type="text" name="" required="">
											<label>cvv</label> 
											<span class="mark_icon">?</span>
										</div> 
										<button type="button" class="success">PAY <i class="fa fa-inr" aria-hidden="true"></i> 948</button> 
									</div> 
									<!-- end onclick hide & show area --> 
								</div>
								
								<div class="payment_option">
									<span class="bank_state"> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress">PhonePe (UPI, Wallet)</span>
									<img src="{{ asset('public/assets/front/images/phone_pay.png')}}" alt="" >
									<!--onclick hide & show area --> 
									<div class="phone_pay">
										<span class="msg_inform">You'll be redirected to PhonePe page, where you can pay using UPI, credit/debit card or any other VPA.</span>
										<button type="button" class="success">CONTINUE</button>
									</div>
									<!-- end onclick hide & show area --> 
								</div>
								<!-- atm option -->
								<div class="payment_option">
									<span class="bank_state blk_"> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress">Credit / Debit / ATM Card</span>
									
									<!--onclick hide & show area -->
									<div class="row">
									    <div class="col-md-6"> 
											<div class="input-box"> 
												<input type="text" name="" required="">
												<label>Enter Card Number</label>  
											</div>
										</div> 
										<div class="col-md-12">
										    <div class="row">
											    <div class="col-md-4">
													<div class="expiry_holder">
														<span class="expiry">Expiry</span> 
														<div class="list_expiry">
															<select class="select_box">
																<option value="MM">YY</option>
																<option value="01">01</option>
																<option value="02">02</option>
																<option value="03">03</option>
																<option value="04">04</option>
																<option value="05">05</option>
																<option value="06">06</option>
																<option value="07">07</option>
																<option value="08">08</option>
																<option value="09">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
														</div>
														
														<div class="list_expiry">
															<select  class="select_box"> 
																<option value="MM">MM</option>
																<option value="01">01</option>
																<option value="02">02</option>
																<option value="03">03</option>
																<option value="04">04</option>
																<option value="05">05</option>
																<option value="06">06</option>
																<option value="07">07</option>
																<option value="08">08</option>
																<option value="09">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
														</div>													
													</div>													
												</div>
												<div class="col-md-8">
													<div class="cvv_area">
														<div class="input-box flt"> 
															<input type="text" name="" required="">
															<label>cvv</label> 
															<span class="mark_icon">?</span>
														</div> 
														<button type="button" class="success">PAY <i class="fa fa-inr" aria-hidden="true"></i> 948</button>  
													</div>
												</div>
												<div class="col-md-12">
												<span class="secure_inform">Your card details would be securely saved for faster payments. Your CVV will not be stored.<span> More info</span></span>

												</div>
											</div>
										</div>
									</div>
									<!-- end onclick hide & show area --> 
								</div>	<!---end atm option--->

   								<!-- bank select area -->
								<div class="payment_option">
									<span class="bank_state blk_"> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress">Net Banking</span>
								    <h3>Popular Banks</h3>
									<div class="Popular_bank_name">
									    <ul>
										    <li> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> <span>HDFC Bank</span></li>
										    <li>  <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> <span>Axis Bank</span></li>
										    <li>  <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> <span>State Bank of India</span></li>
										    <li>  <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> <span>ICICI Bank</span></li>
										    <li>  <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress"> <span>Kotak Bank</span></li>
										</ul>
									</div>
									<h3>Other Banks</h3>
									<div class="other_bank_name">
									    <select>
											<option value="SELECT_BANK">---Select Bank---</option>
											<option value="AIRTELMONEY">Airtel Payments Bank</option>
											<option value="ALLAHABAD">Allahabad Bank</option>
											<option value="ANDHRA">Andhra Bank</option>
											<option value="BANDHAN">Bandhan Bank</option>
											<option value="BASSIENCATHOLICCOOPB">Bassien Catholic Co-Operative Bank</option>
											<option value="BNPPARIBAS">BNP Paribas</option>
											<option value="BOBAHRAIN">Bank of Bahrain and Kuwait</option>
											<option value="BOBARODA">Bank of Baroda</option>
											<option value="BOBARODAC">Bank of Baroda Corporate</option>
											<option value="BOBARODAR">Bank of Baroda Retail</option>
											<option value="BOI">Bank of India</option>
											<option value="BOM">Bank of Maharashtra</option>
											<option value="CANARA">Canara Bank</option>
											<option value="CATHOLICSYRIAN">Catholic Syrian Bank</option>
											<option value="CBI">Central Bank</option>
											<option value="CITYUNION">City Union Bank</option>
											<option value="CORPORATION">Corporation Bank</option>
											<option value="COSMOS">Cosmos Co-op Bank</option>
											<option value="DBS">digibank by DBS</option>
											<option value="DCB">DCB BANK LTD</option>
											<option value="DENA">Dena Bank</option>
											<option value="DEUTSCHE">Deutsche Bank</option>
											<option value="DHANBANK">Dhanalakshmi Bank</option>
											<option value="FEDERALBANK">Federal Bank</option>
											<option value="IDBI">IDBI Bank</option>
											<option value="IDFC">IDFC Bank</option>
											<option value="INDIANBANK">Indian Bank</option>
											<option value="INDUSIND">IndusInd Bank</option>
											<option value="IOB">Indian Overseas Bank</option>
											<option value="JANATABANKPUNE">JANATA SAHAKARI BANK LTD PUNE</option>
											<option value="JKBANK">J&amp;K Bank</option>
											<option value="KARNATAKA">Karnataka Bank</option>
											<option value="KARURVYSYA">Karur Vysya Bank</option>
											<option value="LAKSHMIVILAS">Lakshmi Vilas Bank - Retail</option>
											<option value="LAKSHMIVILASC">Lakshmi Vilas Bank - Corporate</option>
											<option value="OBC">Oriental Bank of Commerce</option>
											<option value="PNB">Punjab National Bank</option>
											<option value="PNBC">Punjab National Bank Corporate</option>
											<option value="PNSB">Punjab &amp; Sind Bank</option>
											<option value="PUNJABMAHA">Punjab &amp; Maharashtra Co-op Bank</option>
											<option value="RATNAKAR">RBL Bank Limited - Retail Net Banking</option>
											<option value="RBS">RBS</option>
											<option value="SARASWAT">Saraswat Co-op Bank</option>
											<option value="SHAMRAOVITHAL">Shamrao Vithal Co-op Bank</option>
											<option value="SOUTHINDIAN">The South Indian Bank</option>
											<option value="STANC">Standard Chartered Bank</option>
											<option value="SYNDICATE">Syndicate Bank</option>
											<option value="TNMERCANTILE">Tamil Nadu Merchantile Bank</option>
											<option value="TNSC">TNSC Bank</option>
											<option value="UCO">UCO Bank</option>
											<option value="UNIONBANK">Union Bank of India</option>
											<option value="UNITEDBANK">United Bank of India</option>
											<option value="VIJAYABANK">Vijaya Bank</option>
											<option value="YESBANK">Yes Bank</option>
										</select>
										<button type="button" class="success">PAY <i class="fa fa-inr" aria-hidden="true"></i> 948</button>
									</div>
								</div>	
								<!-- end bank select area -->
								
								<!-- case on delevery -->
								<div class="payment_option">
									<span class="bank_state blk_"> <input type="radio" class="radio_btn_2" checked="checked" value="male" name="adress">Cash on Delivery</span>
								     
									 <div class="delevery_holder">
									    <div class="case_delevery">
										    <ul>
											    <li> <img src="{{ asset('public/assets/front/images/sk_captcha.jpg')}}"> </li>
											    <li><form><input type="text" name="" placeholder="Enter the characters"></form></li>
											    <li><button type="button" class="success">Confirm Order</button></li>
											</ul>
										</div>
									 </div>
									 
								</div>
								
								<div class="payment_option">
									<span class="new_add gift_option"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add Gift Card</span>
									
									<div class="delevery_holder">
									    <div class="case_delevery">
										    <ul>
											    <li><form><input type="text" name="" placeholder="Voucher Number"></form> </li>
											    <li><form><input type="text" name="" placeholder="Voucher Pin"></form></li>
											    <li><button type="button" class="success">Apply</button></li>
											</ul>
										</div>
										<span class="limit_">You can use maximum of 15 gift cards per transaction.</span>
									</div>
									
								</div>    
								<!--end  case on delevery -->
									 
							</div>
						</div> 
						<!-- end Payment Options -->
						
					</div>   
					
					<!-- price  -->
					<div class="col-md-4 remove_pd">
					    <div id="fixed_price" class="price_holder">
							<div class="main_price">
								<span>Price details</span>
							</div>
							<div class="row clearfix border_bottom">
							    <div class="col-md-6">
								    <span>Price (6 items)</span>
								</div>
								
							    <div class="col-md-6 text-right">
								    <span> <i class="fa fa-inr" aria-hidden="true"></i>  000</span>
								</div>	

							    <div class="col-md-6">
								    <span>Price (6 items)</span>
								</div>
								
							    <div class="col-md-6 text-right">
								    <span><i class="fa fa-inr" aria-hidden="true"></i>  000</span>
								</div>									
							</div> 
							
							<div class="row clearfix">
							    <div class="col-md-6">
								    <span><b>Amount Payable</b></span>
								</div>
								
							    <div class="col-md-6 text-right">
								    <span> <i class="fa fa-inr" aria-hidden="true"></i> 000</span>
								</div>								
							</div> 
                            <span class="green_text">Your Total Savings on this order </span>	
                            <div class="save_money"> <p> Safe and Secure Payments. <br>Easy returns. 100% Authentic products.</p></div>							
						</div>
					</div>
					<!-- price  -->
				</div>
			</div>
		</div>
	</section>
		
	@endsection
