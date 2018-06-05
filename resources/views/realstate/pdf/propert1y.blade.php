
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($title) ? $title : 'Findaproperty'}}</title>

  <!-- CSS file links -->
	<style>
	.phones-div {
		display: flex;justify-content: space-between; align-items:center;
		}
		.phones-ul {
			display: flex; flex-direction: row; align-items: center; justify-content: flex-start;
		}
		.phones-li {
			display:flex;font-weight: 700;font-size: 30px;margin-right: 8px;
		}
		.phones-ico {
			display:flex;font-weight: 700;font-size: 30px;margin-right: 8px;color: #6d458a
		}
		.max-width-img {
			max-width: 500px;
		}
	</style>
  <link href="{{ public_path('realstate/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
  <link href="{{ public_path('realstate/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
  <!-- <link href="{{ public_path('realstate/assets/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ public_path('realstate/assets/slick-1.6.0/slick.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ public_path('realstate/assets/chosen-1.6.2/chosen.min.css') }}" rel="stylesheet"> -->
  <link href="{{ public_path('realstate/css/nouislider.min.css') }}" rel="stylesheet">
  <link href="{{ public_path('realstate/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ public_path('realstate/css/responsive.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('favicon.png?v=2') }}" type="image/x-icon">
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->

  <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
  <script src='https://www.google.com/recaptcha/api.js?hl=en' async defer></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>
<body>

<section class="module" style="width: 100%">
  <div class="container" style="width: 100%">
  
	<div class="row">
		<div class="col-lg-12 col-md-12">
		
			<div class="property-single-item property-main">
				<div class="property-header">
					<div class="property-title">
						<h4>{{ $property->contentload['name'] }}</h4>
						@if($property->sales == 1 && $property->rentals == 1)
						<div class="right Property-ref">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
						<div class="property-price-single right"> &#163;{{ $property->prices['week'] }}<span> Per Week</span></div>
						<div class="property-price-single right">&#163;{{ $property->prices['month'] }}<span> Per Month</span></div>
						<div class="property-price-single right"> &#163;{{ $property->prices['service_charge'] }}<span> For Sale</span></div>
						<div class="property-price-single right">&#163;{{ $property->prices['rates'] }} <span>Rates</span></div>
						@elseif($property->rentals == 1)
						<div class="right Property-ref">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
						<div class="property-price-single right"> &#163;{{ $property->prices['week'] }}<span> Per Week</span></div>
						<div class="property-price-single right">&#163;{{ $property->prices['month'] }}<span> Per Month</span></div>
						@elseif($property->sales == 1)
						<div class="right Property-ref">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
						<div class="property-price-single right">&#163;{{ $property->prices['service_charge'] }}<span>Service Charge</span></div>
						<div class="property-price-single right">&#163;{{ $property->prices['rates'] }} <span>Rates</span></div>
						@endif
            <div class="clear"></div>
					</div>
					<div class="property-single-tags">
						@if($property->sales == 1 && $property->rentals == 1)
            <div class="property-tag lable-sale featured">Sale</div>
						<div class="property-tag lable-rent featured">Rent</div>
						@elseif($property->rentals == 1)
						<div class="property-tag lable-rent featured">Rent</div>
						@elseif($property->sales == 1)
						<div class="property-tag lable-sale featured">Sale</div>
						@endif
						<div class="property-type right">Property Type: <a href="#">{{ $property->category->contentDefault->name }}</a></div>
					</div>
				</div>

				<table class="property-details-single">
					<tr>
						<td><i class="fa fa-home" aria-hidden="true"></i> <span>{{ $property->rooms }}</span> Rooms</td>
						<td><i class="fa fa-bed"></i></i> <span>{{ $property->property_info['bedrooms'] }}</span> Beds</td>
						<td><i class="fa fa-expand"></i> <span>{{ $property->property_info['internal_area'] }}</span> Sq Ft</td>
						<td><i class="fa fa-user" aria-hidden="true"></i> <span>{{ $property->guest_number }}</span> Person</td>
					</tr>
				</table>

        <div class="property-gallery">
          <div class="slide-counter"></div>
          <div class="slider slider-property-gallery">
					{{ URL::asset('images/data').'/'.$property->images->first()->image }}
            <div class="slide"><img class="max-width-img" src="{{ URL::asset('images/data').'/'.$property->images->first()->image }}" alt="" /></div>
						<!-- <div class="slide"><img src="https://imagejournal.org/wp-content/uploads/bb-plugin/cache/23466317216_b99485ba14_o-panorama.jpg" alt="" /></div> -->
				 </div>
          <div class="slider property-gallery-pager">
					@foreach($property->images as $image)
						<a class="property-gallery-thumb"><img src="{{ URL::asset('images/data').'/'.$property->images->first()->image }}" alt="" /></a>
					@endforeach
          </div>
        </div>

			</div><!-- end property title and gallery -->

			<div class="widget property-single-item property-description content">
				<h4>
					<span>Description</span> <img class="divider-hex" src="{{public_path('realstate/images/divider-half.png')}}" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<p>{!! $property->contentload->description !!}</p>
			</div><!-- end description -->

			<div class="widget property-single-item property-location">
				<h4>
					<span>Additional Details</span> <img class="divider-hex" src="{{public_path('realstate/images/divider-half.png')}}" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div class="ui-tabs" style="width: 50%">
					<ul class="additional-details-list">
						<li>Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></li>
						@if($property->sales == 1 && $property->rentals == 1)
						<li>Property Type: <span>Sale/Rent</span></li>
						@elseif($property->rentals == 1)
						<li>Property Type: <span>Rent</span></li>
						@elseif($property->sales == 1)
						<li>Property Type: <span>Sale</span></li>
						@endif
						<li>Internal Area: <span>{{ $property->property_info['internal_area'] }}</span></li>
						<li>External Area: <span>{{ $property->property_info['external_area'] }}</span></li>
						<li>Bathrooms: <span>{{ $property->property_info['bathrooms'] }}</span></li>
						<li>Bedrooms: <span>{{ $property->property_info['bedrooms'] }}</span></li>
					</ul>
				</div>
			</div><!-- end location -->


			@if(isset($property->features))
			<div class="widget property-single-item property-amenities">
				<h4>
					<span>Amenities</span> <img class="divider-hex" src="{{public_path('realstate/images/divider-half.png')}}" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<ul class="amenities-list">
				
					@foreach($features as $feature)
						@foreach($property->features as $propertyFeature)
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
					<span>Location</span> <img class="divider-hex" src="{{public_path('realstate/images/divider-half.png')}}" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div id="map-single"></div>
			</div><!-- end location -->

			<div class="widget property-single-item property-location">
				<h4>
					<span>Contacts</span> <img class="divider-hex" src="{{public_path('realstate/images/divider-half.png')}}" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div class="phone-list-pdf" class="phones-div">
						<ul class="phones-ul">
							<li class="phones-ico"><i class="fa fa-phone"></i></li>
							<li class="phones-li">{{ $static_data['site_settings']['contact_tel1'] }}</li>
							<li class="phones-li">{{ $static_data['site_settings']['contact_tel2'] }}</li>
							<li class="phones-li">{{ $static_data['site_settings']['contact_tel3'] }}</li>
							<li class="phones-li">{{ $static_data['site_settings']['contact_tel4'] }}</li>
							<li class="phones-li">{{ $static_data['site_settings']['contact_tel5'] }}</li>
						</ul>
						<ul style="display: flex; align-items: center;">
							<li style="display:flex;font-weight: 700;font-size: 30px;margin-right: 8px;color: #6d458a"><i class="fa fa-envelope"></i></li>
							<li style="font-weight: 700;font-size: 14px;">{{ $static_data['site_settings']['contact_email'] }}</li>
						</ul>
				</div>
				<div style="display: flex; align-items: center;justify-content:center;width:100%;">
					<img style="max-width: 172px; margin-top: 20px;" src="{{ URL::asset('assets/images/home').'/'.get_setting('site_logo', 'site') }}" alt="Logo" /></a>
				</div>
			</div><!-- end location -->
			
		</div><!-- end col -->
	
		
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

var array = {!! json_encode($property->prop_dates->dates) !!};
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
<script src="{{public_path('realstate/js/map-single.js')}}"></script> <!-- google maps -->
<script>
  var mapOptions = {
    zoom: {{ $property->location['geo_zoom'] }},
    scrollwheel: false,
		center: new google.maps.LatLng({{ $property->location['geo_lon'] }}, {{ $property->location['geo_lat'] }}),
		disableDefaultUI: true,
		draggable: false
	};
</script>

<!-- JavaScript file links -->
<script src="/realstate/js/jquery-3.1.1.min.js"></script> <!-- Jquery -->
<script src="/realstate/assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="/realstate/js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="/realstate/assets/slick-1.6.0/slick.min.js"></script> <!-- slick slider -->
<script src="/realstate/assets/chosen-1.6.2/chosen.jquery.min.js"></script> <!-- chosen - for select dropdowns -->
<script src="/realstate/js/isotope.min.js"></script> <!-- isotope-->
<script src="/realstate/js/wNumb.js"></script> <!-- price formatting -->
<script src="/realstate/js/nouislider.min.js"></script> <!-- price slider -->

<script src="/realstate/js/jquery.matchHeight.js"></script>

<script src="/realstate/js/global.js"></script>


<script src="/realstate/js/contact-forms.js"></script>

<script src="/realstate/js/searchSale.js"></script>

<script src="/realstate/js/searchRent.js"></script>
</body>
</html>