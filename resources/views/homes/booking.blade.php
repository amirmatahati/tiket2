@extends('layouts.app')
@section('content')


<div class="head agile">
	<div class="wthree_head_section">
				<h3 class="w3l_header">Booking <span>Form</span></h3>
			</div>
		<div class="login w3">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" ><span>Flights</span></li>
						<li class="resp-tab-item" ><label>/</label><span>Trains</span></li>
						<li class="resp-tab-item" ><label>/</label><span>Hotels</span></li>
						<li class="resp-tab-item" ><label>/</label><span>Cabs</span></li>
						
					</ul>				  	 
					<div class="resp-tabs-container">
						
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileinfo">
								<h2>Search for flights</h2>
								
								{{ method_field('post') }}
								{!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'id' => 'flight_form'])  !!}
									{{ csrf_field() }}
									
									<div class="fromtop">
										<div class="agileinfo_main_grid held">
											<div class="agileits_w3layouts_grid">
												<h5>From*</h5>
												<select id="category1" name="form_t" required="">
													@if($city->count())
														@foreach($city as $role)
															<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
														@endforeach
													@endif	
												</select>
											</div>
										</div>
										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>To*</h5>
												<select id="category1" name="to" required="">
													@if($city->count())
														@foreach($city as $role)
															<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
														@endforeach
													@endif
												</select>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									
										<div class="agileits_main_grid w3_agileits_main_grid held">
											<div class="wthree_grid">
												<h5>Adults*</h5>
												<select id="category1" name="seat_stock" required="">
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
													<option value="5">05</option>
													<option value="6">06</option>
												</select>
											</div>
										</div>
										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>Children*</h5>
												<select id="category1" name="children" required="">
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
													<option value="5">05</option>
													<option value="6">06</option>
												</select>
											</div>
										</div>
										<div class="clearfix"></div>
<!--										
										<div class="agileinfo_main_grid1">
											<div class="agileits_w3layouts_grid mim">
												<h5>Travel Class*</h5>
												<select id="category2" name="travel_class" required="">
													<option value="economy">Economy class</option>
													<option value="premium">Premium Economy</option>
													<option value="business">Business class</option>
													<option value="first">First Class</option>
												</select>
											</div>
										</div>
-->										
										<div class="agileits_w3layouts_main_grid w3ls_main_grid agileinfo_main_grid held">
											<div class="agileinfo_grid">
											<h5>Departure On*</h5>
												
												<div class="agileits_w3layouts_main_grid1">
													<input class="date" id="datepicker" name="date_on" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '08/13/2016';}" required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
<!--										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>Journey type*</h5>
												<select id="category1" name="journey_type" required="">
													<option value="one way">One Way</option>
													<option value="round trip">Round trip</option>
												</select>
											</div>
										</div>
-->										
										<div class="clearfix"></div>
											<div class="aitssubmitw3ls">
												<input type="submit" name="submit" value="Search">
											</div>
								{!! Form::close() !!}
							</div>
						</div>
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileits">
								<h3>Search for Trains</h3>
								<div class="w3layouts-agileits">

											<div class="w3layoutscontactagileits">
												<form action="#" method="post">
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>Name * </h5>
															<div class="name">
																<input type="text" name="First name" placeholder="Your Name" required="">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>E-mail </h5>
																<input type="email" name="Email" placeholder="ex : yourmail@gmail.com" required="">
														</div>
													</div>

										<div class="agileits_main_grid w3_agileits_main_grid held">
											<div class="wthree_grid">
												<h5>Route</h5>
												<select id="category" name="category" required="">
													<option value="none">None</option>
													<option value="category1">Local</option>
													<option value="category2">Non-local</option>
													
												</select>
											</div>
										</div>
										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>Number of Passengers*</h5>
												<select id="category1" name="category1" required="">
													<option value="category1">01</option>
													<option value="category2">02</option>
													<option value="category3">03</option>
													<option value="category4">04</option>
													<option value="category2">05</option>
													<option value="category3">06</option>
												</select>
											</div>
										</div>
										<div class="clear"></div>
										<div class="agileinfo_main_grid1">
											<div class="agileits_w3layouts_grid">
												<h5>Day*</h5>
												<select id="category2" name="category1" required="">
													<option value="category1">Sunday</option>
													<option value="category2">Monday</option>
													<option value="category3">Tuesday</option>
													<option value="category3">Wednesday</option>
													<option value="category3">Thursday</option>
													<option value="category3">Friday</option>
													<option value="category3">Saturday</option>
												</select>
											</div>
										</div>
										<div class="fromtop">
										<div class="agileinfo_main_grid held">
											<div class="agileits_w3layouts_grid">
												<h5>From*</h5>
												<select id="category1" name="category1" required="">
													<option value="category1">Australia</option>
													<option value="category2">Singapore</option>
													<option value="category3">America</option>
													<option value="category3">London</option>
													<option value="category3">Goa</option>
													<option value="category3">Canada</option>
													<option value="category3">Srilanka</option>
												</select>
											</div>
										</div>
										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>To*</h5>
												<select id="category1" name="category1" required="">
													<option value="category2">Singapore</option>
													<option value="category1">Australia</option>
													<option value="category3">America</option>
													<option value="category3">London</option>
													<option value="category3">Goa</option>
													<option value="category3">Canada</option>
													<option value="category3">Srilanka</option>
												</select>
											</div>
										</div>
										<div class="clear"></div>
										</div>
										
											<div class="aitssubmitw3ls">
												<input type="submit" name="submit" value="Search">
											</div>
										</form>
									</div>
								</div>	
							</div>
						</div>	
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileits">
								<h3>Search for Hotels</h3>
								<div class="w3layouts_main_grid">
									<form action="#" method="post" class="w3_form_post">
										<div class="w3_agileits_main_grid w3l_main_grid">
											<div class="agileits_grid">
												<h5>Name * </h5>
												<div class="nam">
													<input type="text" name="First name" placeholder="First Name" required="">
												</div>
												<div class="nam1">
													<input type="text" name="Last name" placeholder="Last Name" required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="w3_agileits_main_grid w3l_main_grid">
											<div class="agileits_grid">
												<h5>E-mail </h5>
													<input type="email" name="Email" placeholder="ex : yourmail@gmail.com" required="">
											</div>
										</div>
										<div class="agileits_main_grid w3_agileits_main_grid held">
											<div class="wthree_grid">
												<h5>Room Type</h5>
												<select id="category" name="category" required="">
													<option value="none">None</option>
													<option value="category1">Single Room</option>
													<option value="category2">Double Room</option>
													<option value="category3">Suit Room</option>
													
												</select>
											</div>
										</div>
										
										<div class="agileinfo_main_grid">
											<div class="agileits_w3layouts_grid">
												<h5>Number of Guests *</h5>
												<select id="category1" name="category1" required="">
													<option value="category1">01</option>
													<option value="category2">02</option>
													<option value="category3">03</option>
													<option value="category4">04</option>
													<option value="category2">05</option>
													<option value="category3">06</option>
												</select>
											</div>
										</div>
										<div class="clear"></div>
										<div class="agileits_w3layouts_main_grid w3ls_main_grid">
											<div class="agileinfo_grid">
											<h5>Check In &amp; Time *</h5>
												
												<div class="agileits_w3layouts_main_gridl">
													<input class="date" id="datepicker" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '08/13/2016';}" required="">
												</div>
												<div class="agileits_w3layouts_main_gridr">
													<input type="time" name="Time" placeholder=" " required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="agileits_w3layouts_main_grid w3ls_main_grid">
											<div class="agileinfo_grid">
											<h5>Check Out &amp; Time *</h5>
												
												<div class="agileits_w3layouts_main_gridl">
													<input class="date" id="datepicker1" name="Text" type="text" value="yyyy-mm-dd" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '2016-01-01';}" required="">
												</div>
												<div class="agileits_w3layouts_main_gridr">
													<input type="time" name="Time" placeholder=" " required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="w3_main_grid">
											
											<div class="w3_main_grid_right">
												<input type="submit" value="Search">
											</div>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>	
							</div>
						
							
						</div>		
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileinfo">
								<h2>Search for Cabs</h2>
									<div class="containerw3layouts-agileits">

											<div class="w3layoutscontactagileits">
												<form action="#" method="post">
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>Name * </h5>
															<div class="name">
																<input type="text" name="First name" placeholder="Your Name" required="">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>E-mail </h5>
																<input type="email" name="Email" placeholder="ex : yourmail@gmail.com" required="">
														</div>
													</div>

													<div class="aitsphonew3ls agileinfow3ls">
														<div class="aitsphonew3ls-lable wthreelable">
															<label>Phone</label><span class="colon">:</span>
														</div>
														<div class="aitsphonew3ls-input wthreeinput">
															<label>Area Code</label>
															<input class="agilecode" type="tel" pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}" title="Phone Number (Format: +99(99)9999-9999)" name="Area Code" required="">
															<label class="aitsnumber">Number</label>
															<input class="wthreeland" type="tel" pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}" title="Phone Number (Format: +99(99)9999-9999)" name="Number" required="">
															<br>
														</div>
														<div class="clearfix"></div>
													</div>

										<div class="agileits_w3layouts_main_grid w3ls_main_grid">
											<div class="agileinfo_grid">
											<h5>Departure date &amp; Time *</h5>
												
												<div class="agileits_w3layouts_main_gridl">
													<input class="date" id="datepicker1" name="Text" type="text" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '08/13/2016';}" required="">
												</div>
												<div class="agileits_w3layouts_main_gridr">
													<input type="time" name="Time" placeholder=" " required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="agileits_w3layouts_main_grid w3ls_main_grid">
											<div class="agileinfo_grid">
											<h5>Return date &amp; Time *</h5>
												
												<div class="agileits_w3layouts_main_gridl">
													<input class="date" id="datepicker1" name="Text" type="text" value="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '08/13/2016';}" required="">
												</div>
												<div class="agileits_w3layouts_main_gridr">
													<input type="time" name="Time" placeholder=" " required="">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>

													<div class="aitspickupaddress agileinfow3ls">
														<div class="aitspickupaddress-lable wthreelable">
															<span class="agilepickup-lable">
																<label>Pickup</label>
																<label>Address</label>
															</span>
															<span class="colon">:</span>
														</div>
														<div class="aitspickupaddress-input wthreeinput">
															<textarea name="Pickup Address" placeholder="Pickup Address" required=""></textarea>
														</div>
														<div class="clearfix"></div>
													</div>

													<div class="aitsdestinationaddress agileinfow3ls">
														<div class="aitsdestinationaddress-lable wthreelable">
															<span class="agiledest-lable">
																<label>Destination</label>
																<label>Address</label>
															</span>
															<span class="colon">:</span>
														</div>
														<div class="aitsdestinationaddress-input wthreeinput">
															<textarea name="Destination Address" placeholder="Destination Address" required=""></textarea>
														</div>
														<div class="clearfix"></div>
													</div>

													<div class="w3lsjourneyaits agileinfow3ls">
														<div class="w3lsjourneyaits-lable wthreelable">
															<span class="aitsjourney-lable">
																<label>Journey</label>
																<label>Type</label>
															</span>
															<span class="colon">:</span>
														</div>
														<div class="w3lsjourneyaits-input wthreeinput">
															<select name="journey">
																<option value="single">Single</option>
																<option value="two way">Round Trip</option>
															</select>
														</div>
														<div class="clearfix"></div>
													</div>

													<div class="aitssubmitw3ls">
														<input type="submit" name="submit" value="Search">
													</div>

												</form>
											</div>

									</div>		
							</div>
						</div>
					</div>
					<div class="show_hasil">
						
					</div>
				</div>
			</div>	
		</div>	
		<div class="clear"></div>
	</div>
@include('includes/footer')
<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
$("form#flight_form").submit(function(event){
	event.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: "{{ url('/booking-search') }}",
			type: 'POST',
			data: formData,
			async: true,
			cache: false,
			contentType: false,
			processData: false,
//			dataType: "JSON",
			success: function(data)
			{
				//toastr.success('Successfully Added Video!', 'Success Alert', {timeOut: 5000});
				$('.resp-tabs-container').hide();
				 $(".show_hasil").html(data);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable 

			}
		
		});
		return false;
});
</script>



@endsection