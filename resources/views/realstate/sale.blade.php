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
    <h1>Sale</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Sale</a></div>
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
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-price">
										₤ {{ isset($property->prices['price']) ? $property->prices['price'] : 0 }}
								</div>
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
				{{$properties->links()}}
				@else
					<h2>No matches</h2>
			@endif
		
			</div><!-- end row -->
	
		
		
		</div><!-- end listing -->
		
		<div class="col-lg-4 col-md-4 sidebar">
				<input type="hidden" data-sale-min-price value="{{ $saleMinPrice }}">
				<input type="hidden" data-sale-max-price value="{{ $saleMaxPrice }}">
		
			<div class="widget widget-sidebar sidebar-properties advanced-search">
			  <h4><span>Advanced Search</span> <img src="/realstate/images/divider-half-white.png" alt="" /></h4>
			  <div class="widget-content box">
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
						<div id="slider-price-sale" class="price-slider"></div>
				  </div>

					<input type="hidden" id="refer-val-sale">

				  <div class="form-block">
					<input id="find-sale" type="submit" class="button" value="Find Properties" />
				  </div>
				</form>
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
						@if($property->sales == 1)
							<p>
								<strong>₤{{ isset($property->prices['price']) ? $property->prices['price'] : 0 }}</strong> Price
							</p>
						@elseif($property->rentals == 1)
							<p>
								<strong>₤{{ $property->prices['week'] }}</strong> Per Week
							</p>
							<p>
								<strong>₤{{ $property->prices['month'] }}</strong> Per Month
							</p>
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