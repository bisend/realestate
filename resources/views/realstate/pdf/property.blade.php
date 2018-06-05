<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" media="screen">
	<style>
	#footer { position: fixed; left: 0px; bottom: 0; right: 0px; height: 70px; }
	</style>
</head>
<body style="margin:0;">
<footer id="footer">
<div style="text-align: center; width:100%; margin-top: 50px;">
	<p><img style="max-width: 120px; margin-top: 20px;" src="{{ URL::asset('assets/images/home').'/'.get_setting('site_logo', 'site') }}" alt="Logo" /></p>
</div>
</footer>
<div style="text-align: center; width:100%;">
	<p><img style="max-width: 172px;" src="{{ URL::asset('assets/images/home').'/'.get_setting('site_logo', 'site') }}" alt="Logo" /></p>
</div>
<div>
	<h4 style="margin:0;padding: 20px;background-color: #6d458a;color: #fff;font-size: 20px;font-weight: 700;border-bottom:1px solid #eee">{{ $property->contentload['name'] }}</h4>
	<div style="padding: 20px;">
	@if($property->sales == 1 && $property->rentals == 1)
		<div style="float: right;color: #999;">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;"> &#163;{{ $property->prices['week'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;"> Per Week</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;">&#163;{{ $property->prices['month'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;"> Per Month</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;"> &#163;{{ $property->prices['service_charge'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;"> For Sale</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;">&#163;{{ $property->prices['rates'] }} <span style="font-weight: 300;font-size: 17px;margin-left: 10px;">Rates</span></div>
		@elseif($property->rentals == 1)
		<div class="right Property-ref">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;"> &#163;{{ $property->prices['week'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;"> Per Week</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;">&#163;{{ $property->prices['month'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;"> Per Month</span></div>
		@elseif($property->sales == 1)
		<div class="right Property-ref">Property Reference: <span>{{ $property->property_info['property_reference'] }}</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;">&#163;{{ $property->prices['service_charge'] }}<span style="font-weight: 300;font-size: 17px;margin-left: 10px;">Service Charge</span></div>
		<div style="color: #6d458a;font-size: 23px;font-weight: 700;">&#163;{{ $property->prices['rates'] }} <span style="font-weight: 300;font-size: 17px;margin-left: 10px;">Rates</span></div>
		@endif
	</div>
	<div class="clear"></div>
</div>
<div style="padding: 0 20px; margin-bottom: 20px;">
	<div style="float:right;color: #999;">Property Type: <span style="font-size: 20px;margin-left:10px;color: #6d458a;font-weight: 600;">{{ $property->category->contentDefault->name }}</span></div>
	@if($property->sales == 1 && $property->rentals == 1)
	<ul style="margin: 0;padding:0;width: 100%;">
		<li style="display: inline-block;width: 65px;"><div style="background: #6d458a;width: 60px;padding: 4px 0;text-align: center;border-radius: 7px;color: #fff;margin:5px 0;">Rent</div></li>
		<li style="display: inline-block;width: 65px;"><div style="background: #c7c6c6;width: 60px;padding: 4px 0;text-align: center;border-radius: 7px;color: #fff;margin:5px 0;">Sale</div></li>
	</ul>
	@elseif($property->rentals == 1)
	<div style="background: #6d458a;width: 60px;padding: 4px 0;text-align: center;border-radius: 7px;color: #fff;margin:5px 0;">Rent</div>
	@elseif($property->sales == 1)
	<div style="background: #c7c6c6;width: 60px;padding: 4px 0;text-align: center;border-radius: 7px;color: #fff;margin:5px 0;">Sale</div>
	@endif
</div>
<div>
	<img style="width: 100%" src="{{ URL::asset('images/data').'/'.$property->images->first()->image }}" alt="" />
</div>
<br>
<div>
	@foreach($property->images as $image)
		<img style="width: 17%" src="{{ URL::asset('images/data').'/'.$image->image }}" alt="" />
	@endforeach
</div>

<div >
<h4 style="margin:0;padding: 20px;background-color: #6d458a;color: #fff;font-size: 20px;font-weight: 700;border-bottom:1px solid #eee">
	<span>Description</span>
</h4>
<p style="padding:0 20px;">{!! $property->contentload->description !!}</p>
<h4 style="margin:0;padding: 20px;background-color: #6d458a;color: #fff;font-size: 20px;font-weight: 700;border-bottom:1px solid #eee">
	<span>Additional Details</span>
	<div class="divider-fade"></div>
</h4>
<ul class="additional-details-list" style="list-style:none;padding-left:20px;">
	<li>Property Reference: <span style="margin-left:10px;font-weight: 600;color: #6d458a">{{ $property->property_info['property_reference'] }}</span></li>
	@if($property->sales == 1 && $property->rentals == 1)
	<li>Property Type: <span style="margin-left:10px;font-weight: 600;color: #6d458a">Sale/Rent</span></li>
	@elseif($property->rentals == 1)
	<li>Property Type: <span style="margin-left:10px;font-weight: 600;color: #6d458a">Rent</span></li>
	@elseif($property->sales == 1)
	<li>Property Type: <span style="margin-left:10px;font-weight: 600;color: #6d458a">Sale</span></li>
	@endif
	<li>Internal Area: <span style="margin-left:10px;font-weight: 600;color: #6d458a">{{ $property->property_info['internal_area'] }}</span></li>
	<li>External Area: <span style="margin-left:10px;font-weight: 600;color: #6d458a">{{ $property->property_info['external_area'] }}</span></li>
	<li>Bathrooms: <span style="margin-left:10px;font-weight: 600;color: #6d458a">{{ $property->property_info['bathrooms'] }}</span></li>
	<li>Bedrooms: <span style="margin-left:10px;font-weight: 600;color: #6d458a">{{ $property->property_info['bedrooms'] }}</span></li>
</ul>
@if(isset($property->features))
	<div class="widget property-single-item property-amenities">
		<h4 style="margin:0;padding: 20px;background-color: #6d458a;color: #fff;font-size: 20px;font-weight: 700;border-bottom:1px solid #eee">
			<span>Amenities</span>
			<div class="divider-fade"></div>
		</h4>
		<ul class="amenities-list" style="list-style:none;margin:0;padding:20px;">
		
			@foreach($features as $feature)
				@foreach($property->features as $propertyFeature)
					@if($propertyFeature == $feature->id)
						<li style="list-style:none;margin:0;padding:0;"><i style="color: #6d458a;margin-right: 5px;" class="fa fa-check-circle-o" aria-hidden="true"></i> {{$feature->feature[$default_language->id]}}</li>
					@endif
				@endforeach
			@endforeach
		
		</ul>
	</div><!-- end amenities -->
	@endif
<h4 style="margin:0;padding: 20px;background-color: #6d458a;color: #fff;font-size: 20px;font-weight: 700;border-bottom:1px solid #eee">
	<span>Contacts</span>
	<div class="divider-fade"></div>
</h4>
<div class="phone-list-pdf" class="phones-div">
		<ul style="padding-left:20px;margin-right:20px;list-style:none;">
			<li style="display: inline-block;"><i style="margin-right:10px;font-size:20px;color: #6d458a;" class="fa fa-envelope"></i>{{ $static_data['site_settings']['contact_email'] }}</li>
		</ul>
		<ul style="list-style:none;padding: 0 17px">
			<li style="margin-right:8px;" class="phones-li"><i style="margin-right:16px;font-size:20px;color: #6d458a;" class="fa fa-phone"></i>{{ $static_data['site_settings']['contact_tel1'] }}</li>
			<li style="margin-right:8px;" class="phones-li"><i style="margin-right:16px;font-size:20px;color: #6d458a;" class="fa fa-phone"></i>{{ $static_data['site_settings']['contact_tel2'] }}</li>
			<li style="margin-right:8px;" class="phones-li"><i style="margin-right:16px;font-size:20px;color: #6d458a;" class="fa fa-phone"></i>{{ $static_data['site_settings']['contact_tel3'] }}</li>
			<li style="margin-right:8px;" class="phones-li"><i style="margin-right:16px;font-size:20px;color: #6d458a;" class="fa fa-phone"></i>{{ $static_data['site_settings']['contact_tel4'] }}</li>
			<li style="margin-right:8px;" class="phones-li"><i style="margin-right:16px;font-size:20px;color: #6d458a;" class="fa fa-phone"></i>{{ $static_data['site_settings']['contact_tel5'] }}</li>
		</ul>
		<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</body>
</html>