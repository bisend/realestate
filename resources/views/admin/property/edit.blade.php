@extends('layouts.admin')

@section('title')
    <title>{{get_string('edit_property') . ' - ' . get_setting('site_name', 'site')}}</title>
@endsection

@section('content')
@section('page_title')
    <h3 class="page-title mbot10">{{get_string('edit_property')}}</h3>
@endsection
<div class="col s12">
    @if(!$errors->isEmpty())
        <span class="wrong-error">* {{get_string('validation_error')}}</span>
    @endif
    {!!Form::open(['method' => 'patch', 'url' => route('admin.property.update', $property->id), 'files' => 'true'])!!}
    <div class="panel">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="tab active"><a href="#content-panel" data-toggle="tab">{{get_string('content')}}</a></li>
                <li class="tab"><a href="#data-panel" data-toggle="tab">{{get_string('data')}}</a></li>
                <li class="tab"><a href="#property-panel" data-toggle="tab">{{get_string('property')}}</a></li>
                <li class="tab"><a href="#meta-panel" data-toggle="tab">{{get_string('meta')}}</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="content-panel" class="tab-pane active">
                    <div class="panel">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                @foreach($languages as $language)
                                    <li class="tab {{$language->default ? 'active' : ''}}"><a href="#lang{{$language->id}}" data-parent="#content" data-toggle="tab"><img src="{{$language->flag}}"/><span>{{$language->language}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                @foreach($languages as $language)
                                    <div id="lang{{$language->id}}" class="tab-pane {{$language->default ? 'active' : ''}}">
                                        <div class="col s12">
                                            <div class="form-group  {{$errors->has('name.'.$language->id.'') ? 'has-error' : ''}}">
                                                {{Form::text('name['.$language->id.']',  $property->content($language->id)->name, ['class' => 'form-control', 'placeholder' => get_string('category_name')])}}
                                                {{Form::label('name['.$language->id.']', get_string('category_name'))}}
                                                @if($errors->has('name.'.$language->id.''))
                                                    <span class="wrong-error">* {{$errors->first('name.'.$language->id.'')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            {{Form::textarea('description['.$language->id.']', $property->content($language->id)->description, ['class' => 'hidden desc-content'])}}
                                            @if($errors->has('description.'.$language->id.''))
                                                <span class="wrong-error">* {{$errors->first('description.'.$language->id.'')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="data-panel" class="tab-pane">
                    <div class="col s12">
                         <div class="form-group  {{$errors->has('alias') ? 'has-error' : ''}}">
                            {{Form::text('alias', $property->alias, ['class' => 'form-control', 'placeholder' => get_string('alias')])}}
                            {{Form::label('alias', get_string('alias'))}}
                            @if($errors->has('alias'))
                                <span class="wrong-error">* {{$errors->first('alias')}}</span>
                            @endif
                         </div>    
                    </div>
                    <div class="col l3 m4 s6 right right-align mbot0">
                        <div class="form-group">
                            <div class="switch">
                                <label>
                                Unactive<input type="checkbox" name="status" {{$property->status ? 'checked' : ''}}><span class="lever"></span>Active
                                </label>
                            </div>
                        </div>
                    </div> 
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('general')}}</h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('property_info.property_reference') ? 'has-error' : ''}}">
                            {{Form::text('property_info[property_reference]',  $property->property_info['property_reference'], ['class' => 'form-control', 'placeholder' => 'Property Reference'])}}
                            {{Form::label('property_info[property_reference]', 'Property Reference')}}
                            @if($errors->has('property_info.property_reference'))
                                <span class="wrong-error">* {{$errors->first('property_info.property_reference')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col m6 s6">
                        <div class="form-group  {{$errors->has('category_id') ? 'has-error' : ''}}">
                            {{Form::select('category_id', $categories, $property->category_id, ['class' => 'category-select form-control', 'placeholder' => get_string('choose_category')])}}
                            @if($errors->has('category_id'))
                                <span class="wrong-error">* {{$errors->first('category_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <!-- <div class="col m4 s6">
                        <div class="form-group  {{$errors->has('category_id') ? 'has-error' : ''}}">
                            {{Form::select('category_id', $categories, $property->category_id, ['class' => 'category-select form-control', 'placeholder' => get_string('choose_category')])}}
                            @if($errors->has('category_id'))
                                <span class="wrong-error">* {{$errors->first('category_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col m4 s6">
                        <div class="form-group  {{$errors->has('location_id') ? 'has-error' : ''}}">
                            {{Form::select('location_id', $locations, $property->location_id, ['class' => 'location-select form-control', 'placeholder' => get_string('choose_location')])}}
                            @if($errors->has('location_id'))
                                <span class="wrong-error">* {{$errors->first('location_id')}}</span>
                            @endif
                        </div>
                    </div>-->
                    <div class="col s12 well checkbox-grid">
                        <p>{{get_string('choose_features')}}</p>
                        @foreach($features as $feature)
                            <div class="col s2">
                                <div class="form-group">
                                    <input type="checkbox" name="features[]" @if((old('features') && in_array_r($feature->id, old('features'))) || ($property->features && in_array($feature->id, $property->features))) checked @endif value="{{$feature->id}}" class="filled-in primary-color" id="{{$feature->id}}" />
                                    <label for="{{$feature->id}}"></label>
                                    <span class="checkbox-label">{{$feature->feature[$default_language->id]}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('media')}}</h5>
                    </div>
                    <div class="col l12 m12 s12">
                        <div id="file-dropzone" class="dropzone">
                            <div class="dz-message">{{get_string('upload_images')}}<br/><i class="material-icons medium">cloud_upload</i>
                            </div>
                            <div class="fallback">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col s12">
                        <div class="form-group  {{$errors->has('video') ? 'has-error' : ''}}">
                            {{Form::text('video', $property->video, ['class' => 'form-control', 'placeholder' => get_string('video_id')])}}
                            {{Form::label('video', get_string('video_id'))}}
                            @if($errors->has('video'))
                                <span class="wrong-error">* {{$errors->first('video')}}</span>
                            @endif
                        </div>
                    </div> -->
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('location')}}</h5>
                    </div>
                    <div class="col s12">
                        <div class="row mbot0">
                            <div class="col l6 m12 s12">
                                <div class="form-group  {{($errors->has('location.geo_lon') || ($errors->has('location.geo_lon')))  ? 'has-error' : ''}}">
                                    <!-- {{Form::text('marker', null, ['class' => 'form-control autocomplete', 'id' => 'address-map', 'placeholder' => get_string('drop_marker')])}}
                                    {{Form::label('marker', get_string('drop_marker'))}} -->
                                    @if($errors->has('location.geo_lon') || $errors->has('location.geo_lat'))
                                        <span class="wrong-error">* {{get_string('google_address_required')}} </span>
                                    @endif
                                </div>
                                <div id="google-map">
                                </div>
                            </div>
                            <div class="col l6 m12 s12">
                                <div class="row mbot0">
                                    <div class="col l12 m12 s12">
                                        <div class="form-group">
                                            {{Form::hidden('location[geo_lon]', $property->location['geo_lon'], ['class' => 'form-control', 'placeholder' => get_string('geo_lon')])}}
                                            <!-- {{Form::label('location[geo_lon]', get_string('geo_lon'))}} -->
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group">
                                            {{Form::hidden('location[geo_lat]', $property->location['geo_lat'], ['class' => 'form-control', 'placeholder' => get_string('geo_lat')])}}
                                            <!-- {{Form::label('location[geo_lat]', get_string('geo_lat'))}} -->
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group">
                                            {{Form::hidden('location[geo_zoom]', $property->location['geo_zoom'], ['class' => 'form-control', 'placeholder' => 'Zoom'])}}
                                            <!-- {{Form::label('location[zoom]', 'Zoom')}} -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <div class="collapsible-header"><span>{{get_string('contact')}}</span><i class="material-icons small accordion-active">remove_circle</i><i class="material-icons small accordion-disabled">add_circle</i>
                                    <i class="material-icons small color-red {{($errors->has('contact.tel1') || $errors->has('contact.tel2') || $errors->has('contact.fax') || $errors->has('contact.email') || $errors->has('contact.web')) ? '' : 'hidden'}}">report_problem</i>
                                </div>
                                <div class="collapsible-body">
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('contact.tel1') ? 'has-error' : ''}}">
                                            {{Form::text('contact[tel1]', $property->contact['tel1'], ['class' => 'form-control', 'placeholder' => get_string('contact_tel1')])}}
                                            {{Form::label('contact[tel1]', get_string('contact_tel1'))}}
                                            @if($errors->has('contact.tel1'))
                                                <span class="wrong-error">* {{$errors->first('contact.tel1')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('contact.tel2') ? 'has-error' : ''}}">
                                            {{Form::text('contact[tel2]', $property->contact['tel2'], ['class' => 'form-control', 'placeholder' => get_string('contact_tel2')])}}
                                            {{Form::label('contact[tel2]', get_string('contact_tel2'))}}
                                            @if($errors->has('contact.tel3'))
                                                <span class="wrong-error">* {{$errors->first('contact.tel2')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('contact.fax') ? 'has-error' : ''}}">
                                            {{Form::text('contact[fax]', $property->contact['fax'], ['class' => 'form-control', 'placeholder' => get_string('fax')])}}
                                            {{Form::label('contact[fax]', get_string('fax'))}}
                                            @if($errors->has('contact.fax'))
                                                <span class="wrong-error">* {{$errors->first('contact.fax')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('contact.email') ? 'has-error' : ''}}">
                                            {{Form::text('contact[email]', $property->contact['email'], ['class' => 'form-control', 'placeholder' => get_string('email')])}}
                                            {{Form::label('contact[email]', get_string('email'))}}
                                            @if($errors->has('contact.email'))
                                                <span class="wrong-error">* {{$errors->first('contact.email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('contact.web') ? 'has-error' : ''}}">
                                            {{Form::text('contact[web]', $property->contact['web'], ['class' => 'form-control', 'placeholder' => get_string('website')])}}
                                            {{Form::label('contact[web]', get_string('website'))}}
                                            @if($errors->has('contact.web'))
                                                <span class="wrong-error">* {{$errors->first('contact.web')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col s12">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <div class="collapsible-header"><span>{{get_string('social_networks')}}</span><i class="material-icons small accordion-active">remove_circle</i><i class="material-icons small accordion-disabled">add_circle</i></div>
                                <div class="collapsible-body">
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[facebook]') ? 'has-error' : ''}}">
                                            {{Form::text('social[facebook]', $property->social['facebook'], ['class' => 'form-control', 'placeholder' => get_string('facebook')])}}
                                            {{Form::label('social[facebook]', get_string('facebook'))}}
                                            @if($errors->has('social[facebook]'))
                                                <span class="wrong-error">* {{$errors->first('social[facebook]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[gplus]') ? 'has-error' : ''}}">
                                            {{Form::text('social[gplus]', $property->social['gplus'], ['class' => 'form-control', 'placeholder' => get_string('google_plus')])}}
                                            {{Form::label('social[gplus]', get_string('google_plus'))}}
                                            @if($errors->has('social[gplus]'))
                                                <span class="wrong-error">* {{$errors->first('social[gplus]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[twitter]') ? 'has-error' : ''}}">
                                            {{Form::text('social[twitter]', $property->social['twitter'], ['class' => 'form-control', 'placeholder' => get_string('twitter')])}}
                                            {{Form::label('social[twitter]', get_string('twitter'))}}
                                            @if($errors->has('social[twitter]'))
                                                <span class="wrong-error">* {{$errors->first('social[twitter]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[instagram]') ? 'has-error' : ''}}">
                                            {{Form::text('social[instagram]', $property->social['instagram'], ['class' => 'form-control', 'placeholder' => get_string('instagram')])}}
                                            {{Form::label('social[instagram]', get_string('instagram'))}}
                                            @if($errors->has('social[instagram]'))
                                                <span class="wrong-error">* {{$errors->first('social[instagram]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[pinterest]') ? 'has-error' : ''}}">
                                            {{Form::text('social[pinterest]', $property->social['pinterest'], ['class' => 'form-control', 'placeholder' => get_string('pinterest')])}}
                                            {{Form::label('social[pinterest]', get_string('pinterest'))}}
                                            @if($errors->has('social[pinterest]'))
                                                <span class="wrong-error">* {{$errors->first('social[pinterest]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  {{$errors->has('social[linkedin]') ? 'has-error' : ''}}">
                                            {{Form::text('social[linkedin]', $property->social['linkedin'], ['class' => 'form-control', 'placeholder' => get_string('linkedin')])}}
                                            {{Form::label('social[linkedin]', get_string('linkedin'))}}
                                            @if($errors->has('social[linkedin]'))
                                                <span class="wrong-error">* {{$errors->first('social[linkedin]')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden-fields hidden">
                    </div>
                </div>
                <div id="property-panel" class="tab-pane">
                    <div class="col s12 clearfix">
                        <h5 class="section-title">Sales or Rentals</h5>
                    </div>
                    <div class="col s12 checkbox-grid">
                        <div class="form-group  {{$errors->has('sale_rent') ? 'has-error' : ''}}">
                            <form action="" class="form-control">
                                <div class="col s2">
                                    <div class="form-group">
                                        <input type="checkbox" class="filled-in primary-color" id="contactChoice1" name="sale_rent[]" value="sales" {{ $property->sales == 1 ? 'checked' : ''}}>
                                        <label for="contactChoice1"></label>
                                        <span class="checkbox-label">Sales</span>
                                    </div>
                                </div>
                                <div class="col s2">
                                    <div class="form-group">
                                        <input type="checkbox"  class="filled-in primary-color" id="contactChoice2" name="sale_rent[]" value="rentals" {{ $property->rentals == 1 ? 'checked' : ''}}>
                                        <label for="contactChoice2"></label>
                                        <span class="checkbox-label">Rentals</span>
                                    </div>
                                </div>
                            </form>
                            @if($errors->has('sale_rent'))
                                <span class="wrong-error">* Choose one of the options</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('property_info')}}</h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('property_info.internal_area') ? 'has-error' : ''}}">
                            {{Form::text('property_info[internal_area]', $property->property_info['internal_area'], ['class' => 'form-control', 'placeholder' => 'Internal Area'])}}
                            {{Form::label('property_info[internal_area]', 'Internal Area m')}}<sup>2</sup>
                            @if($errors->has('property_info.internal_area'))
                                <span class="wrong-error">* {{$errors->first('property_info.internal_area')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('property_info.external_area') ? 'has-error' : ''}}">
                            {{Form::text('property_info[external_area]', $property->property_info['external_area'], ['class' => 'form-control', 'placeholder' => 'External Area'])}}
                            {{Form::label('property_info[external_area]', 'External Area m')}}<sup>2</sup>
                            @if($errors->has('property_info.external_area'))
                                <span class="wrong-error">* {{$errors->first('property_info.external_area')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('guest_number') ? 'has-error' : ''}}">
                            {{Form::text('guest_number', $property->guest_number, ['class' => 'form-control', 'placeholder' => get_string('guest_number')])}}
                            {{Form::label('guest_number', get_string('guest_number'))}}
                            @if($errors->has('guest_number'))
                                <span class="wrong-error">* {{$errors->first('guest_number')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('rooms') ? 'has-error' : ''}}">
                            {{Form::text('rooms', $property->rooms, ['class' => 'form-control', 'placeholder' => get_string('property_rooms')])}}
                            {{Form::label('rooms', get_string('property_rooms'))}}
                            @if($errors->has('rooms'))
                                <span class="wrong-error">* {{$errors->first('rooms')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('property_info.bedrooms') ? 'has-error' : ''}}">
                            {{Form::text('property_info[bedrooms]', $property->property_info['bedrooms'], ['class' => 'form-control', 'placeholder' => get_string('property_bedrooms')])}}
                            {{Form::label('property_info[bedrooms]', get_string('property_bedrooms'))}}
                            @if($errors->has('property_info.bedrooms'))
                                <span class="wrong-error">* {{$errors->first('property_info.bedrooms')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('property_info.bathrooms') ? 'has-error' : ''}}">
                            {{Form::text('property_info[bathrooms]', $property->property_info['bathrooms'], ['class' => 'form-control', 'placeholder' => get_string('property_bathrooms')])}}
                            {{Form::label('property_info[bathrooms]', get_string('property_bathrooms'))}}
                            @if($errors->has('property_info.bathrooms'))
                                <span class="wrong-error">* {{$errors->first('property_info.bathrooms')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('property_prices')}}</h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('prices.service_charge') ? 'has-error' : ''}}">
                            {{Form::text('prices[service_charge]', $property->prices['service_charge'], ['class' => 'form-control', 'placeholder' => 'Service Charge'])}}
                            {{Form::label('prices[service_charge]', 'Service Charge')}}
                            @if($errors->has('prices.service_charge'))
                                <span class="wrong-error">* {{$errors->first('prices.service_charge')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('prices.rates') ? 'has-error' : ''}}">
                            {{Form::text('prices[rates]', $property->prices['rates'], ['class' => 'form-control', 'placeholder' => 'Rates'])}}
                            {{Form::label('prices[rates]', 'Rates')}}
                            @if($errors->has('prices.rates'))
                                <span class="wrong-error">* {{$errors->first('prices.rates')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('prices.week') ? 'has-error' : ''}}">
                            {{Form::text('prices[week]', isset($property->prices['week']) ? $property->prices['week'] : null, ['class' => 'form-control', 'placeholder' => 'Price per week'])}}
                            {{Form::label('prices[week]', 'Price per week')}}
                            @if($errors->has('prices.week'))
                                <span class="wrong-error">* {{$errors->first('prices.week')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('prices.month') ? 'has-error' : ''}}">
                            {{Form::text('prices[month]', isset($property->prices['month']) ? $property->prices['month'] : null, ['class' => 'form-control', 'placeholder' => 'Price per month'])}}
                            {{Form::label('prices[month]', 'Price per month')}}
                            @if($errors->has('prices.month'))
                                <span class="wrong-error">* {{$errors->first('prices.month')}}</span>
                            @endif
                        </div>
                    </div>
                    <!-- <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('property_fees')}}</h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('fees.city_fee') ? 'has-error' : ''}}">
                            {{Form::text('fees[city_fee]', $property->fees['city_fee'], ['class' => 'form-control', 'placeholder' => get_string('city_fee')])}}
                            {{Form::label('fees[city_fee]', get_string('city_fee'))}}
                            @if($errors->has('fees.city_fee'))
                                <span class="wrong-error">* {{$errors->first('fees.city_fee')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  {{$errors->has('fees[cleaning_fee]') ? 'has-error' : ''}}">
                            {{Form::text('fees[cleaning_fee]', $property->fees['cleaning_fee'], ['class' => 'form-control', 'placeholder' => get_string('cleaning_fee')])}}
                            {{Form::label('fees[cleaning_fee]', get_string('cleaning_fee'))}}
                            @if($errors->has('fees.cleaning_fee'))
                                <span class="wrong-error">* {{$errors->first('fees.cleaning_fee')}}</span>
                            @endif
                        </div>
                    </div> -->
                </div>
                <div id="meta-panel" class="tab-pane">
                    <div class="col s12 clearfix">
                        <h5 class="section-title">{{get_string('meta')}}</h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group">
                            {{Form::text('meta_title', $property->meta_title, ['class' => 'form-control', 'placeholder' => get_string('meta_title')])}}
                            {{Form::label('meta_title', get_string('meta_title'))}}
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group">
                            {{Form::text('meta_keywords', $property->meta_keywords, ['class' => 'form-control', 'placeholder' => get_string('meta_keywords')])}}
                            {{Form::label('meta_keywords', get_string('meta_keywords'))}}
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="form-group">
                            {{Form::textarea('meta_description', $property->meta_description, ['class' => 'form-control', 'placeholder' => get_string('meta_description')])}}
                            {{Form::label('meta_description', get_string('meta_description'))}}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col clearfix s12 mtop10">
                <div class="form-group">
                    <button class="btn waves-effect" type="submit" name="action">{{get_string('edit_property')}}</button>
                    <a href="{{route('admin.property.index')}}" class="btn waves-effect">{{get_string('property_all')}}</a>
                    <a href="#" class="delete-button btn waves-effect btn-red" data-id="{{$property->id}}"><i class="material-icons color-white">delete</i></a>
                </div>
            </div>
            {{Form::hidden('user_id', $property->user_id)}}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_setting('google_map_key', 'site')}}&libraries=places"></script>
    <script>
        $(document).ready(function(){
            $('.desc-content').summernote({
                height: 200,
                maxwidth: false,
                minwidth: false,
                placeholder: '{{get_string('enter_property_content')}}',
                disableDragAndDrop: true,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                ],callbacks: {
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    }
                }
            });
        });

        Dropzone.autoDiscover = false;
        $(document).ready(function(){
            var fileDropzone = $('#file-dropzone');
            $(fileDropzone).dropzone({
                url: '{{url('/image_handler/upload')}}',
                paramsName: 'image',
                params: {_token: $('[name=_token]').val()},
                maxFilesize: 100,
                uploadMultiple: false,
                addRemoveLinks: true,
                maxfilesize: 1,
                parallelUploads: 1,
                maxFiles: 6,
                init: function() {

                    @if($property->images)
                        @foreach($property->images as $image)
                            var mockFile = { name: '{{ $image->image }}', size: 100000 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, '/images/data/{{ $image->image }}');
                            this.emit("success", mockFile);
                        $('.hidden-fields').append('<input type="hidden" name="images[]" value="{{ $image->image }}">');
                        @endforeach
                    @endif

                    this.on('success', function(file, json) {
                        var selector = file._removeLink;
                        $(selector).attr('data-dz-remove', json.data);
                        $('.hidden-fields').append('<input type="hidden" name="images[]" value="'+ json.data +'">');
                    });

                    this.on('addedfile', function(file) {

                    });

                    this.on("removedfile", function(file) {
                        var selector = file._removeLink;
                        var data = $(selector).attr('data-dz-remove');
                        if(!data){
                            data = file.name;
                            $.ajax({
                                type: 'POST',
                                url: '{{url('/image_handler/deleteBase')}}',
                                data: {data: data, _token: $('[name=_token]').val(), type: 'property', id: '{{$property->id}}'},
                                dataType: 'html',
                                success: function(msg){
                                    $('.hidden-fields').find('[value="'+ data +'"]').remove();
                                }
                            });
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: '{{url('/image_handler/delete')}}',
                                data: {data: data, _token: $('[name=_token]').val()},
                                dataType: 'html',
                                success: function(msg){
                                    $('.hidden-fields').find('[value="'+ data +'"]').remove();
                                }
                            });
                        }
                    });
                }
            });
        });

        // Google Map
        $(document).ready(function() {
            if(typeof google !== 'undefined' && google){
                var map = new google.maps.Map(document.getElementById('google-map'), {
                    center:{
                        lat: {{ $property->location['geo_lon'] }},
                        lng: {{ $property->location['geo_lat'] }}
                    },
                    zoom: {{ $property->location['geo_zoom'] }}
                });
                var marker = new google.maps.Marker({
                    position: {
                        lat: {{ $property->location['geo_lon'] }},
                        lng: {{ $property->location['geo_lat'] }}
                    },
                    map: map,
                    draggable: true
                });
                var infowindow = new google.maps.InfoWindow();
                var searchBox = document.getElementById('address-map');
                var autocomplete = new google.maps.places.Autocomplete(searchBox);
                marker.setVisible(false);
                autocomplete.bindTo('bounds', map);
                autocomplete.addListener('place_changed', function() {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        return;
                    }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(15);
                    }

                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }

                    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                    infowindow.open(map, marker);
                });

                // google.maps.event.addListener(marker, 'position_changed', function () {
                //     var lat = marker.getPosition().lat();
                //     var lng = marker.getPosition().lng();
                //     $('[name="location[geo_lon]"]').val(lat);
                //     $('[name="location[geo_lat]"]').val(lng);
                // });
                google.maps.event.addListener(map, 'center_changed', function () {
                    var zoom = map.getZoom();
                    var lat = map.getCenter().lat();
                    var lng = map.getCenter().lng();
                    $('[name="location[geo_lon]"]').val(lat);
                    $('[name="location[geo_lat]"]').val(lng);
                    $('[name="location[geo_zoom]"]').val(zoom);
                });
                $('a[href$="data-panel"]').click(function(){
                    var currCenter = map.getCenter();
                    setTimeout(function(){
                        google.maps.event.trigger($("#google-map")[0], 'resize');
                        map.setCenter(currCenter);
                    }, 50);
                });
            }
        });
        $(document).ready(function(){
            $('.delete-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('delete_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/') }}/'+id,
                                type: 'post',
                                data: {_method: 'delete', _token :token},
                                success:function(msg) {
                                    window.location = "/admin/property";
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection