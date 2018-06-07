@extends('realstate.layout')

@section('mainsection')
		
		<div class="tabs tabs-form tab-forms-show">
			<a class="close-tab-forms">
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
			</a>
				<ul class="tabs-form-nav">
					<li><a class="open-tab-forms" href="#tab-form-callback"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
					<li><a class="open-tab-forms" href="#tab-form-register"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
				</ul>
			<div class="forms-div">
			<div id="tab-form-callback" class="ui-tabs-hide">
				<div class="fix-form-header">
            Call Back
        </div>
				<form action="" id="coll-back-form" methods="post">
							<input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
							<label for="name">Name:</label>
							<input id="call-back-name" type="text" placeholder="Name" name="name">
							<label for="phone">Phone Number:</label>
							<input id="call-back-phone" type="text" placeholder="Phone" name="phone">
							<div class="recaptcha-div">
									<span id="recaptcha-error-callback">Please complete the verification!</span>
									<div class="recaptcha-style" id="call-back-captcha"></div>
							</div>
							<button id="send-coll-back" class="button button-icon alt small"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Send</button>
					</form>
				</div>
				<div id="tab-form-register" class="ui-tabs-hide">
					<div class="fix-form-header">
							Register Interest
					</div>
					<form action="" id="register-interest-form" methods="post">
							<input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
							<label for="name">Name:</label>
							<input type="text" placeholder="Name" name="name" id="register-name">
							<label for="email">Email:</label>
							<input type="text" placeholder="Email" name="email" id="register-email">

							<label for="phone">Phone Number:</label>
							<input type="text" placeholder="Phone Number" name="phone" id="register-phone">
							
							<div class="recaptcha-div">
									<span id="recaptcha-error-reg">Please complete the verification!</span>
									<div class="recaptcha-style" id="reg-back-captcha"></div>
							</div>

							<button id="send-register-form" class="button button-icon alt small"><i class="fa fa-envelope" aria-hidden="true"></i>Send</button>
					</form>
				</div>
			</div>
		</div>


<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="property-single-item property-main">
				<div class="property-header">
					<div class="property-title">
						<h4>{{ $mainProperty->contentload['name'] }}</h4>
						<div class="right Property-ref">
							Property Reference: <span>{{ $mainProperty->property_info['property_reference'] }}</span>
						</div>
						@if(isset($mainProperty->prices['price']))
							<div class="property-price-single right">
								₤{{ $mainProperty->prices['price'] }}<span> Price</span>
							</div>
						@else
							<div class="property-price-single right">
								₤ 0<span> Price</span>
							</div>
						@endif
            <div class="clear"></div>
					</div>
					<div class="property-single-tags">
						@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
            <div class="property-tag lable-sale featured">Sale</div>
						<div class="property-tag lable-rent featured">Rent</div>
						@elseif($mainProperty->rentals == 1)
						<div class="property-tag lable-rent featured">Rent</div>
						@elseif($mainProperty->sales == 1)
						<div class="property-tag lable-sale featured">Sale</div>
						@endif
						<div class="property-type right">Property Type: <a href="#">{{ $mainProperty->category->contentDefault->name }}</a></div>
					</div>
				</div>

				<table class="property-details-single">
					<tr>
						<td><i class="fa fa-home" aria-hidden="true"></i> <span>{{ $mainProperty->rooms }}</span> Rooms</td>
						<td><i class="fa fa-bed"></i></i> <span>{{ $mainProperty->property_info['bedrooms'] }}</span> Beds</td>
						<td><i class="fa fa-expand"></i> <span>{{ $mainProperty->property_info['internal_area'] }}</span> Sq Ft</td>
						<!-- <td><i class="fa fa-user" aria-hidden="true"></i> <span>{{ $mainProperty->guest_number }}</span> PDF</td> -->
						<td><a href="{{$mainProperty->pdfFile['path']}}" target="_blank" class="pdf-down-prop"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span>PDF</span> </a></td>
					</tr>
				</table>

        <div class="property-gallery">
          <div class="slider-nav slider-nav-property-gallery">
            <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
            <span class="slider-next"><i class="fa fa-angle-right"></i></span>
          </div>
          <div class="slide-counter"></div>
          <div class="slider slider-property-gallery">
					@foreach($mainProperty->images as $image)
            <div class="slide"><img src="{{ asset('images/data/'.$image->image) }}" alt="" /></div>
					@endforeach
          </div>
          <div class="slider property-gallery-pager">
					@foreach($mainProperty->images as $image)
						<a class="property-gallery-thumb"><img src="{{ asset('images/data/'.$image->image) }}" alt="" /></a>
					@endforeach
          </div>
        </div>

			</div><!-- end property title and gallery -->

			<div class="widget property-single-item property-description content">
				<h4>
					<span>Description</span> <img class="divider-hex" src="/realstate/images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<p>{!! $mainProperty->contentload->description !!}</p>

				<div class="tabs">
			        <ul>
			          <li><a href="#tabs-1"><i class="fa fa-pencil icon"></i>Additional Details</a></li>
			          <li><a href="#tabs-2"><i class="fa fa-files-o icon"></i>Attachments</a></li>
								@if($property->rentals == 1)
									<li><a href="#tabs-3"><i class="fa fa-calendar" aria-hidden="true"></i></i>Calendar</a></li>
								@endif

			        </ul>
			        <div id="tabs-1" class="ui-tabs-hide">
			          <ul class="additional-details-list">
			          	<li>Property Reference: <span>{{ $mainProperty->property_info['property_reference'] }}</span></li>
			          	@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
									<li>Property Type: <span>Sale/Rent</span></li>
									@elseif($mainProperty->rentals == 1)
									<li>Property Type: <span>Rent</span></li>
									@elseif($mainProperty->sales == 1)
									<li>Property Type: <span>Sale</span></li>
									@endif
			          	<li>Internal Area: <span>{{ $mainProperty->property_info['internal_area'] }}</span></li>
			          	<li>External Area: <span>{{ $mainProperty->property_info['external_area'] }}</span></li>
						<li>Bathrooms: <span>{{ $mainProperty->property_info['bathrooms'] }}</span></li>
						<li>Bedrooms: <span>{{ $mainProperty->property_info['bedrooms'] }}</span></li>
						@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
							<li>Per Week: <span>₤ {{ $mainProperty->prices['week'] }}</span></li>
							<li>Per Month: <span>₤ {{ $mainProperty->prices['month'] }}</span></li>
							<li>For Sale: <span>₤ {{ $mainProperty->prices['service_charge'] }}</span></li>
							<li>Rates: <span>₤ {{ $mainProperty->prices['rates'] }}</span></li>
						@elseif($mainProperty->rentals == 1)
							<li>Per Week: <span>₤ {{ $mainProperty->prices['week'] }}</span></li>
							<li>Per Month: <span>₤ {{ $mainProperty->prices['month'] }}</span></li>
						@elseif($mainProperty->sales == 1)
							<li>For Sale: <span>₤ {{ $mainProperty->prices['service_charge'] }}</span></li>
							<li>Rates: <span>₤ {{ $mainProperty->prices['rates'] }}</span></li>
						@endif
			          </ul>
			        </div>

			        <div id="tabs-2" class="ui-tabs-hide">
								@if(isset($property->files))
									@foreach($property->files as $file)
			          		<a href="{{$file->path}}" target="_blank"><i class="fa fa-file-o icon"></i> {{$file->name}}</a><br/><br/>
									@endforeach
								@endif
			        </div>
							@if($property->rentals == 1)
							<div id="tabs-3" class="ui-tabs-hide">
								<div id="datepicker"></div>
			        </div>
							@endif
			    </div>
			</div><!-- end description -->
			@if(isset($mainProperty->features))
			<div class="widget property-single-item property-amenities">
				<h4>
					<span>Amenities</span> <img class="divider-hex" src="/realstate/images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<ul class="amenities-list">
				
					@foreach($features as $feature)
						@foreach($mainProperty->features as $propertyFeature)
							@if($propertyFeature == $feature->id)
								<li><i class="fa fa-check icon"></i> {{$feature->feature[$default_language->id]}}</li>
							@endif
						@endforeach
					@endforeach
				
				</ul>
			</div><!-- end amenities -->
			@endif
			<div class="widget property-single-item property-location">
				<h4>
					<span>Location</span> <img class="divider-hex" src="/realstate/images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div id="map-single"></div>
			</div><!-- end location -->

			

			<div class="widget property-single-item property-related">
				<h4>
					<span>Related Properties</span> <img class="divider-hex" src="/realstate/images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>

				<div class="row">
				@if(isset($related_properties))
					@foreach($related_properties as $property)
					<div class="col-lg-6 col-md-6">
						<div class="property shadow-hover">
						<a href="/property/{{$property->alias}}" class="property-img">
								<div class="img-fade"></div>
								@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-tag lable-sale featured">Rent</div>
								@elseif($mainProperty->rentals == 1)
								<div class="property-tag lable-sale featured">Rent</div>
								@elseif($mainProperty->sales == 1)
								<div class="property-tag lable-sale featured">Sale</div>
								@endif
								<div class="property-price">
									@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
									<div>
									₤{{ $mainProperty->prices['service_charge'] }} <span>For Sale</span>
									</div>
									<div class="price-perWeek">
									₤{{ $mainProperty->prices['month'] }} <span>Per  Month</span>
									</div>
									@elseif($mainProperty->rentals == 1)
									<div class="price-perWeek">
									₤{{ $mainProperty->prices['month'] }} <span>Per  Month</span>
									</div>
									@elseif($mainProperty->sales == 1)
									<div>
									₤{{ $mainProperty->prices['service_charge'] }} <span>For Sale</span>
									</div>
									@endif
									
              	</div>
								<div class="property-color-bar"></div>
								<div class="prop-img-home prop-img-home-rent-sale">
										<img src="{{ $property->imageByStatus }}" alt="" />
								</div>
						</a>
						<div class="property-content">
								<div class="property-title">
								<h4><a href="/property/{{$property->alias}}">{{ $property->contentload->name }}</a></h4>
								</div>
								<table class="property-details property-details-grid">
								<tr>
										<td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $property->rooms }}</td>
										<td><i class="fa fa-bed"></i>{{ $property->property_info['bedrooms'] }}</td>
										<td><i class="fa fa-expand"></i>{{ $property->property_info['internal_area'] }}</td>
										<td><i class="fa fa-user" aria-hidden="true"></i>{{ $property->guest_number }}</td>
								</tr>
								</table>
							</div>
						</div>
					</div>		
					@endforeach
				@endif
			    </div><!-- end row -->
			</div><!-- end related properties -->

		</div><!-- end col -->
		
		<div class="col-lg-4 col-md-4 sidebar sidebar-property-single">
		
			<div class="widget widget-sidebar advanced-search">
			  <h4><span>Advanced Search</span> <img src="/realstate/images/divider-half-white.png" alt="" /></h4>
			  <div class="widget-content box">
					
				<div class="tabs tabs-search">
					<ul class="tabs-search-nav">
						<li><a class="open-tabs-search tbs-sale" href="#tabs-search-sale">For Sale</a></li>
						<li><a class="open-tabs-search tbs-rent" href="#tabs-search-rent">For Rent</a></li>
					</ul>
					<div class="forms-div">
						<div id="tabs-search-sale" class="ui-tabs-hide">
						<form id="search-sale" method="post">

								<div class="form-block border">
									<label for="search_sale-type">Property Type</label>
									<select id="search_sale-type" class="border">
										<option value="">Any</option>
										@if(isset($categories))
											@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->contentDefault->name}}</option>
											@endforeach
										@endif
									</select>
									</div>

								<div class="form-block border">
									<label>Country</label>
									<select class="border" id="search_sale-country" name="property-country">
												<option class="country-any" value="">Any</option>
												@foreach($countries as $country)
												<option value="{{$country->id}}">{{$country->contentDefault->location}}</option>
												@endforeach
									</select>
								</div>
			
								<div class="form-block border">
									<label>Location</label>
									<select class="location-select border" id="search_sale-location" name="location">
												<option class="location-any" value="">Any</option>
												@foreach($locations as $location)
														<option class="country-{{$location->country_id}}" value="{{$location->id}}">{{$location->contentDefault->location}}</option>                        
												@endforeach
									</select>
								</div>


									<div class="form-block border">
										<label>Beds</label>
										<select name="beds" id="search_sale-beds" class="border">
												<option value="">Any</option>
												<option value="studio">Studio+</option>
												<option value="1">1+</option>
												<option value="2">2+</option>
												<option value="3">3+</option>
												<option value="4">4+</option>
												<option value="5">5+</option>
												<option value="6">6+</option>
												<option value="7">7+</option>
												<option value="8">8+</option>
												<option value="9">9+</option>
												<option value="10">10+</option>
										</select>
										</div>
									
									<div class="form-block">
										<label>Price</label>
										<div id="slider-price-sale" class="price-slider"></div>
									</div>

									<input type="hidden" id="refer-val-sale">

									<div class="form-block">
									<input id="find-sale" type="submit" class="button" value="Find Properties" />
									</div>
								</form>
						</div>
						<div id="tabs-search-rent" class="ui-tabs-hide">
								<form id="search-rent">
										
										<div class="form-block border">
										<label for="property-status">Property Type</label>
										<select id="search_rent-type" class="border">
											<option value="">Any</option>
											@if(isset($categories))
												@foreach($categories as $category)
														<option value="{{$category->id}}">{{$category->contentDefault->name}}</option>
												@endforeach
											@endif
										</select>
										</div>

										 <div class="form-block border">
												<label>Country</label>
												<select class="border" id="search_rent-country" name="property-country">
													<option value="">Any</option>
															@foreach($countries as $country)
															<option value="{{$country->id}}">{{$country->contentDefault->location}}</option>
															@endforeach
												</select>
											</div>
						
											<div class="form-block border">
												<label>Location</label>
												<select class="location-select border" id="search_rent-location" name="location">
															<option class="location-any" value="">Any</option>
															@foreach($locations as $location)
																	<option class="country-{{$location->country_id}}" value="{{$location->id}}">{{$location->contentDefault->location}}</option>                        
															@endforeach
												</select>
											</div>

										<div class="form-block border">
											<label>Beds</label>
											<select name="beds" id="search_rent-beds" class="border">
													<option value="">Any</option>
													<option value="studio">Studio+</option>
													<option value="1">1+</option>
													<option value="2">2+</option>
													<option value="3">3+</option>
													<option value="4">4+</option>
													<option value="5">5+</option>
													<option value="6">6+</option>
													<option value="7">7+</option>
													<option value="8">8+</option>
													<option value="9">9+</option>
													<option value="10">10+</option>
											</select>
											</div>
										
										<div class="form-block">
										<label>Price</label>
										<div id="price-rent" class="price-slider-rent"></div>
										</div>

										<input type="hidden" id="refer-val-rent">

										<div class="form-block">
										<input id="find-rent-btn" type="submit" class="button" value="Find Properties" />
										</div>
									</form>
						</div>
					</div>
			</div>

			  </div><!-- end widget content -->
			</div><!-- end widget -->
			
			<div class="widget widget-sidebar recent-properties">
			  <h4><span>Recent Properties</span> <img src="/realstate/images/divider-half.png" alt="" /></h4>
			  <div class="widget-content">
				@foreach($recent_properties as $property)
				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<a href="/property/{{$property->alias}}">
						<div class="recent-img">
						<img src="{{ $property->imageByStatus }}" alt="" />

						</div>
					</a>
				</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="/property/{{$property->alias}}">{{ $property->contentload->name }}</a></h5>
						@if($property->rentals == 1)
						<p><strong>₤{{ $property->prices['month'] }}</strong> Per Month</p>
						@elseif($property->sales == 1)
						<p><strong>₤{{ $property->prices['service_charge'] }}</strong></p>
						@endif					</div>
				  </div>
				</div>
				@endforeach
			  </div><!-- end widget content -->
			</div><!-- end widget -->

      <div class="widget widget-sidebar recent-posts">
          <h4><span>Recent Blog Posts</span> <img src="/realstate/images/divider-half.png" alt="" /></h4>
          <div class="widget-content">
					@foreach($last_posts as $last_post)
          <div class="recent-property">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
							<a href="{{url('/blog/post').'/'.$last_post->alias}}">
							 <div class="recent-img">
							 	<img src="{{ isset($last_post->image) ? url('/').$last_post->image : URL::asset('images/no_image.jpg')}}" alt="" />
							 </div>
						</a></div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <h5><a href="{{url('/blog/post').'/'.$last_post->alias}}">{{ $last_post->contentload->title }}</a></h5>
              <p><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($last_post['created_at'])->format('M') }}, {{ \Carbon\Carbon::parse($last_post['created_at'])->format('j') }}th {{ \Carbon\Carbon::parse($last_post['created_at'])->format('Y') }}</p>
            </div>
            </div>
          </div>
					@endforeach
          </div><!-- end widget content -->
      </div><!-- end widget -->
			
		
		</div><!-- end sidebar -->
		
	</div><!-- end row -->

  </div><!-- end container -->
</section>

<script>
  // $( function() {
  //   $( "#datepicker" ).datepicker({
  //     changeMonth: true,
  //     changeYear: true
  //   });
  // } );

var array = {!! json_encode($mainProperty->prop_dates->dates) !!};
// var array = ["05/25/2018"];
$('#datepicker').datepicker({
    beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('mm/dd/yy', date);
        return [$.inArray(string, array) == -1];
    },
		changeMonth: true,
    changeYear: true
});

  </script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{get_setting('google_map_key', 'site')}}&sensor=false"></script>
<script src="/realstate/js/map-single.js"></script> <!-- google maps -->
<script>
  var mapOptions = {
    zoom: {{ $mainProperty->location['geo_zoom'] }},
    scrollwheel: false,
		center: new google.maps.LatLng({{ $mainProperty->location['geo_lon'] }}, {{ $mainProperty->location['geo_lat'] }}),
		disableDefaultUI: false,
		draggable: true		
	};
</script>



@endsection


