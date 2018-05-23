@extends('realstate.layout')

@section('mainsection')

<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="property-single-item property-main">
				<div class="property-header">
					<div class="property-title">
						<h4>{{ $mainProperty->contentload['name'] }}</h4>
						@if($mainProperty->sales == 1 && $mainProperty->rentals == 1)
						<div class="property-price-single right">${{ $mainProperty->prices['service_charge'] }}<span> Per Month</span></div>
						<div class="property-price-single right"> ${{ $mainProperty->prices['week'] }}<span> Per Week</span></div>
						@elseif($mainProperty->rentals == 1)
						<div class="property-price-single right">${{ $mainProperty->prices['week'] }}<span>Per Month</span> </div>
						@elseif($mainProperty->sales == 1)
						<div class="property-price-single right">${{ $mainProperty->prices['service_charge'] }}<span></span></div>
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
						<td><i class="fa fa-user" aria-hidden="true"></i> <span>{{ $mainProperty->guest_number }}</span> PErson</td>
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
            <div class="slide"><img src="{{URL::asset('images/data').'/'.$image->image}}" alt="" /></div>
					@endforeach
          </div>
          <div class="slider property-gallery-pager">
					@foreach($mainProperty->images as $image)
						<a class="property-gallery-thumb"><img src="{{URL::asset('images/data').'/'.$image->image}}" alt="" /></a>
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
			          <li><a href="#tabs-3"><i class="fa fa-files-o icon"></i>Attachments</a></li>
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
			          </ul>
			        </div>

			        <div id="tabs-3" class="ui-tabs-hide">
			          <a href="#"><i class="fa fa-file-o icon"></i> 1</a><br/><br/>
			        </div>
			    </div>
			</div><!-- end description -->

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
					<div class="col-lg-6 col-md-6">
						<div class="property shadow-hover">
						<a href="#" class="property-img">
								<div class="img-fade"></div>
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-price">
									<div>
										10000$ <span>For Buy</span>
									</div>
									<div class="price-perWeek">
										1000$ <span>Per  Month</span>
									</div>
              	</div>
								<div class="property-color-bar"></div>
								<div class="prop-img-home">
										<img src="images/testimg/test2.jpg" alt="" />
								</div>
						</a>
						<div class="property-content">
								<div class="property-title">
								<h4><a href="#">Beautiful Waterfront Condo</a></h4>
								</div>
								<table class="property-details property-details-grid">
								<tr>
										<td><i class="fa fa-home" aria-hidden="true"></i></i>12</td>
										<td><i class="fa fa-bed"></i>12</td>
										<td><i class="fa fa-expand"></i>12</td>
										<td><i class="fa fa-user" aria-hidden="true"></i>12</td>
								</tr>
								</table>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<div class="property shadow-hover">
						<a href="#" class="property-img">
								<div class="img-fade"></div>
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-price">
									<div>
										10000$ <span>For Buy</span>
									</div>
									<div class="price-perWeek">
										1000$ <span>Per  Month</span>
									</div>
              	</div>
								<div class="property-color-bar"></div>
								<div class="prop-img-home">
										<img src="images/testimg/test2.jpg" alt="" />
								</div>
						</a>
						<div class="property-content">
								<div class="property-title">
								<h4><a href="#">Beautiful Waterfront Condo</a></h4>
								</div>
								<table class="property-details property-details-grid">
								<tr>
										<td><i class="fa fa-home" aria-hidden="true"></i></i>12</td>
										<td><i class="fa fa-bed"></i>12</td>
										<td><i class="fa fa-expand"></i>12</td>
										<td><i class="fa fa-user" aria-hidden="true"></i>12</td>
								</tr>
								</table>
							</div>
						</div>
					</div>

			    </div><!-- end row -->
			</div><!-- end related properties -->

		</div><!-- end col -->
		
		<div class="col-lg-4 col-md-4 sidebar sidebar-property-single">
		
			<div class="widget widget-sidebar advanced-search">
			  <h4><span>Advanced Search</span> <img src="/realstate/images/divider-half-white.png" alt="" /></h4>
			  <div class="widget-content box">
					<form>
						<div class="form-block border">
						<label for="property-location">Location</label>
						<select id="property-location" class="border">
							<option value="">Any</option>
							<option value="baltimore">Baltimore</option>
							<option value="ny">New York</option>
							<option value="nap">Annapolis</option>
						</select>
						</div>
	
						<div class="form-block border">
						<label for="property-status">Property Type</label>
						<select id="property-status" class="border">
							<option value="">Any</option>
							<option value="sale">For Sale</option>
							<option value="rent">For Rent</option>
						</select>
						</div>
	
						<div class="form-block border">
							<label>Beds</label>
							<select name="beds" id="property-beds" class="border">
								<option value="">Any</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							</div>
						
						<div class="form-block">
						<label>Price</label>
						<div class="price-slider"></div>
						</div>
	
						<div class="form-block">
						<input type="submit" class="button" value="Find Properties" />
						</div>
					</form>
			  </div><!-- end widget content -->
			</div><!-- end widget -->
			
			<div class="widget widget-sidebar recent-properties">
			  <h4><span>Recent Properties</span> <img src="/realstate/images/divider-half.png" alt="" /></h4>
			  <div class="widget-content">
				@foreach($recent_properties as $property)
				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"><a href="/property/{{$property->alias}}"><img src="{{ isset($property->images->first()->image) ? URL::asset('images/data').'/'.$property->images->first()->image : URL::asset('images/no_image.jpg')}}" alt="" /></a></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="/property/{{$property->alias}}">{{ $property->contentload->name }}</a></h5>
					  <p><strong>${{ $property->prices['month'] }}</strong> {{ $property->rentals == 1 ? 'Per Month' : '' }}</p>
					</div>
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
            <div class="col-lg-4 col-md-4 col-sm-4"><a href="{{url('/blog/post').'/'.$last_post->alias}}"><img src="{{ isset($last_post->imagee) ? url('/').$last_post->image : URL::asset('images/no_image.jpg')}}" alt="" /></a></div>
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{get_setting('google_map_key', 'site')}}&sensor=false"></script>
<script src="/realstate/js/map-single.js"></script> <!-- google maps -->
<script>
  var mapOptions = {
    zoom: {{ $mainProperty->location['geo_zoom'] }},
    scrollwheel: false,
    center: new google.maps.LatLng({{ $mainProperty->location['geo_lon'] }}, {{ $mainProperty->location['geo_lat'] }})
	};
</script>

@endsection