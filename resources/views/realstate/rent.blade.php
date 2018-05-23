@extends('realstate.layout')

@section('mainsection')

<section class="subheader subheader-listing-sidebar">
  <div class="container">
    <h1>Rent</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Rent</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="row">

      @foreach($properties as $property)
				<div class="col-lg-6 col-md-6">
					<div class="property shadow-hover">
					<a href="/property/{{$property->alias}}" class="property-img">
							<div class="img-fade"></div>
							<div class="property-tag lable-rent featured">Rent</div>
							
							<div class="property-price">
                <div>
								${{ $property->prices['month'] }} <span>Per Month</span>
                </div>
								<div class="price-perWeek">
								${{ $property->prices['week'] }} <span>Per  Week</span>
								</div>
              </div>


							<!-- <div class="property-price">${{ $property->prices['month'] }} Per Month</div> -->
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
			</div><!-- end row -->
			
			
		</div><!-- end listing -->
		
		<div class="col-lg-4 col-md-4 sidebar">
		
			<div class="widget widget-sidebar sidebar-properties advanced-search">
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

		</div><!-- end sidebar -->
		
	</div><!-- end row -->

  </div><!-- end container -->
</section>



@endsection