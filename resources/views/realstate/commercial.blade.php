@extends('realstate.layout')

@section('mainsection')
<div class="contact-form-fix Call-Back-wrap form-active">
        <div class="show-btn-wrapper">
            <button class="show-collback"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></button>
        </div>
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




<section class="subheader subheader-listing-sidebar">
  <div class="container">
    <h1>Commercial</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Commercial</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="row">
			@if(isset($properties) && count($properties) > 0)
				@foreach($properties as $property)
					<div class="col-lg-6 col-md-6">
						<div class="property shadow-hover">
						<a href="/property/{{$property->alias}}" class="property-img">
							<div class="img-fade"></div>
							@if($property->property_status)
							<div class="label-actv">
								{{ $property->property_status->name }}
							</div>
							@endif
							@if($property->sales == 1 && $property->rentals == 1)
								<div class="property-tag lable-sale lable-sale-to-left featured">Sale</div>
								<div class="property-tag lable-rent featured">Rental</div>
								<div class="property-price property-price-com">
									@if($property->prices['price'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['price'] }} <span>Price</span></div>	
									@endif
									@if($property->prices['week'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['week'] }} <span>Per Week</span></div>
									@endif
									@if($property->prices['month'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['month'] }} <span>Per Month</span></div>
									@endif
								</div>
                            @elseif($property->rentals == 1)
								<div class="property-tag lable-rent featured">Rental</div>
								<div class="property-price property-price-com">
									@if($property->prices['week'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['week'] }} <span>Per Week</span></div>
									@endif
									@if($property->prices['month'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['month'] }} <span>Per Month</span></div>
									@endif
								</div>
                            @elseif($property->sales == 1)
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-price property-price-com">
									@if($property->prices['price'])
									<div>{{ $property->currency->symbol}}{{ $property->prices['price'] }} <span>Price</span></div>
									@endif
								</div>
                            @endif
							<div class="property-color-bar"></div>
							<div class="prop-img-home prop-img-home-rent-sale">
								<img src="{{ isset($property->images->first()->image) ? URL::asset('images/data').'/'.$property->images->first()->image : URL::asset('images/no_image.jpg')}}" alt="" />
							</div>
						</a>
						<div class="property-content">
								<div class="property-title">
								<h4><a href="/property/{{$property->alias}}">{{ $property->contentload->name }}</a></h4>
								</div>
								<table class="property-details property-details-grid">
								<tr>
									<td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $property->category->contentDefault->name }}</td>
									@if($property->property_info['bedrooms'])
									<td><i class="fa fa-bed"></i>{{ $property->property_info['bedrooms'] }}</td>
									@endif
									@if($property->property_info['internal_area'])
									<td><i class="fa fa-expand"></i>{{ $property->property_info['internal_area'] }}</td>
									@endif
									{{-- <td><i class="fa fa-user" aria-hidden="true"></i>{{ $property->guest_number }}</td> --}}
								</tr>
								</table>
							</div>
						</div>
					</div>
				@endforeach
				{{$properties->links()}}
				@else
				<h2>No matches</h2>
			@endif
			</div><!-- end row -->
	
		
		
		</div><!-- end listing -->
		
		<div class="col-lg-4 col-md-4 sidebar">
			<div class="widget widget-sidebar sidebar-properties advanced-search">
					<input type="hidden" data-sale-min-price value="{{ $saleMinPrice ? $saleMinPrice : 0 }}">
					<input type="hidden" data-sale-max-price value="{{ $saleMaxPrice ? $saleMaxPrice : 0 }}">
					<input type="hidden" data-rent-min-price-per-week value="{{ $rentMinPricePerWeek ? $rentMinPricePerWeek : 0 }}">
					<input type="hidden" data-rent-max-price-per-week value="{{ $rentMaxPricePerWeek ? $rentMaxPricePerWeek : 0 }}">
					<input type="hidden" data-rent-min-price-per-month value="{{ $rentMinPricePerMonth ? $rentMinPricePerMonth : 0 }}">
					<input type="hidden" data-rent-max-price-per-month value="{{ $rentMaxPricePerMonth ? $rentMaxPricePerMonth : 0 }}">
					
					<input type="hidden" data-sale-min-price-pound value="{{ $saleMinPricePound ? $saleMinPricePound : 0 }}">
					<input type="hidden" data-sale-max-price-pound value="{{ $saleMaxPricePound ? $saleMaxPricePound : 0 }}">
					<input type="hidden" data-rent-min-price-per-week-pound value="{{ $rentMinPricePerWeekPound ? $rentMinPricePerWeekPound : 0 }}">
					<input type="hidden" data-rent-max-price-per-week-pound value="{{ $rentMaxPricePerWeekPound ? $rentMaxPricePerWeekPound : 0 }}">
					<input type="hidden" data-rent-min-price-per-month-pound value="{{ $rentMinPricePerMonthPound ? $rentMinPricePerMonthPound : 0 }}">
					<input type="hidden" data-rent-max-price-per-month-pound value="{{ $rentMaxPricePerMonthPound ? $rentMaxPricePerMonthPound : 0 }}">

			  	<h4>
					<span>Advanced Search</span> <img src="/realstate/images/divider-half-white.png" alt="" />
				</h4>
				
				<div class="widget-content box">
					<div class="tabs tabs-search">
						<ul class="tabs-search-nav">
							<li><a class="open-tabs-search tbs-sale" href="#tabs-search-sale">For Sale</a></li>
							<li><a class="open-tabs-search tbs-rent" href="#tabs-search-rent">For Rental</a></li>
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
											{{-- <option class="country-any" value="">Any</option> --}}
												@foreach($countries as $country)
													<option value="{{$country->id}}" {{ $country->contentDefault->location == 'Gibraltar' ? 'selected' : '' }}>
														{{$country->contentDefault->location}}
													</option>
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
									<div class="form-block border rooms-filter filter-item-sale beds-item-sale rooms-filter-dark">
										<label>Beds</label>
										<div class="beds-radio">
											<p>
												<input value="1" type="radio" id="1-plus-sale" name="radio-group-sale">
												<label for="1-plus-sale"></label>
												<span>1+</span>
											</p>
											<p>
												<input value="2" type="radio" id="2-plus-sale" name="radio-group-sale">
												<label for="2-plus-sale"></label>
												<span>2+</span>
											</p>
											<p>
												<input value="3" type="radio" id="3-plus-sale" name="radio-group-sale">
												<label for="3-plus-sale"></label>
												<span>3+</span>
											</p>
											<p>
												<input value="4" type="radio" id="4-plus-sale" name="radio-group-sale">
												<label for="4-plus-sale"></label>
												<span>4+</span>
											</p>
											<p>
												<input value="5" type="radio" id="5-plus-sale" name="radio-group-sale">
												<label for="5-plus-sale"></label>
												<span>5+</span>
											</p>
										</div>
									</div>		
									<div class="form-block">
										<label>Price</label>
										{{-- <div id="slider-price-sale" class="price-slider"></div> --}}
										<div id="price-slider" class="price-slider"></div>
										<div id="price-slider-pound" class="price-slider"></div>
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
											{{-- <option value="">Any</option> --}}
											@foreach($countries as $country)
												<option value="{{$country->id}}" {{ $country->contentDefault->location == 'Gibraltar' ? 'selected' : ''}}>
													{{$country->contentDefault->location}}
												</option>
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
									<div class="form-block border rooms-filter beds-item-rent rooms-filter-dark">
										<label>Beds</label>
											<div class="beds-radio">
												<p>
													<input value="1" type="radio" id="1-plus-rent" name="radio-group-rent">
													<label for="1-plus-rent"></label>
													<span class="val-radio">1+</span>
												</p>
												<p>
													<input value="2" type="radio" id="2-plus-rent" name="radio-group-rent">
													<label for="2-plus-rent"></label>
													<span class="val-radio">2+</span>
												</p>
												<p>
													<input value="3" type="radio" id="3-plus-rent" name="radio-group-rent">
													<label for="3-plus-rent"></label>
													<span class="val-radio">3+</span>
												</p>
												<p>
													<input value="4" type="radio" id="4-plus-rent" name="radio-group-rent">
													<label for="4-plus-rent"></label>
													<span class="val-radio">4+</span>
												</p>
												<p>
													<input value="5" type="radio" id="5-plus-rent" name="radio-group-rent">
													<label for="5-plus-rent"></label>
													<span class="val-radio">5+</span>
												</p>
											</div>
									</div>					
									<div class="form-block">
										<label>Price per week</label>
										<div id="price-rent-pw" class="slider-price">
											<div class="price-slider-rent" id="price-slider-rent-per-week"></div>
											<div class="price-slider-rent" id="price-slider-rent-per-week-pound"></div>
										</div>
										{{-- <div id="price-rent" class="price-slider-rent"></div> --}}
	
										<label>Price per month</label>
										<div id="price-rent-pm" class="slider-price">
											<div class="price-slider-rent" id="price-slider-rent-per-month"></div>
											<div class="price-slider-rent" id="price-slider-rent-per-month-pound"></div>
										</div>
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
			@if(isset($recent_properties))
				@foreach($recent_properties as $property)
				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"><a href="/property/{{$property->alias}}"><img src="{{ $property->imageByStatus }}" alt="" /></a></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="/property/{{$property->alias}}">{{ $property->contentload->name }}</a></h5>
					  @if($property->sales == 1 && $property->rentals == 1)
					  	@if($property->prices['price'])
					  	<p>
							<strong>{{ $property->currency->symbol}}{{ isset($property->prices['price']) ? $property->prices['price'] : 0 }}</strong> Price
						</p>
						@endif
						@if($property->prices['week'])  
						<p>
							<strong>{{ $property->currency->symbol}}{{ $property->prices['week'] }}</strong> Per Week
						</p>
						@endif
						@if($property->prices['month'])
						<p>
							<strong>{{ $property->currency->symbol}}{{ $property->prices['month'] }}</strong> Per Month
						</p>
						@endif
					  @elseif($property->sales == 1)
						@if($property->prices['price'])	
					  	<p>
							<strong>{{ $property->currency->symbol}}{{ isset($property->prices['price']) ? $property->prices['price'] : 0 }}</strong> Price
						</p>
						@endif
					  @elseif($property->rentals == 1)
						@if($property->prices['week'])	
					  	<p>
							<strong>{{ $property->currency->symbol}}{{ $property->prices['week'] }}</strong> Per Week
						</p>
						@endif
						@if($property->prices['month'])
						<p>
							<strong>{{ $property->currency->symbol}}{{ $property->prices['month'] }}</strong> Per Month
						</p>
						@endif
					  @endif
					</div>
				  </div>
				</div>
				@endforeach
			@endif

			  </div><!-- end widget content -->
			</div><!-- end widget -->

		</div><!-- end sidebar -->
		
	</div><!-- end row -->

  </div><!-- end container -->
</section>

@endsection