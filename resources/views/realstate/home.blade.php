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






    <section class="subheader subheader-slider">
  <div class="slider-wrap">

    <div class="slider-nav slider-nav-simple-slider">
      <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
      <span class="slider-next"><i class="fa fa-angle-right"></i></span>
    </div>

    <div class="slider slider-simple slider-advanced">
    @foreach($slider as $slide)     
      <div class="slide" style="background-image: url('{{ $slide->imageByStatus }}')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">₤250,000</div>
          <div class="slide-content">
            <h1>{{ $slide->contentload->name }}</h1>
            <p class="slide-text">{{ str_limit($slide->contentload->description, 200, ' ...') }}</p>
            <table>
              <tr>
                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $slide->category->contentDefault->name }}</td>
                <td><i class="fa fa-bed"></i>{{ $slide->rooms }}</td>
                <td><i class="fa fa-expand"></i>{{ $slide->property_info['internal_area'] }}</td>
                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $slide->guest_number }}</td>
              </tr>
            </table>
            <span class="lable-rent right mobile-lable-flout">{{ $slide->sales == 1 ? 'Sale' : ''}} {{ $slide->rentals == 1 ? 'Rent' : '' }}</span>
            <a href="/property/{{$slide->alias}}" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>
    @endforeach
    
    </div><!-- end slider -->
  </div><!-- end slider wrap -->
</section>

<section class="module no-padding-top filter">

  <div class="tabs">

    <div class="filter-header">
      <div class="container">
          <ul>
            <li><a href="#tabs-2">For Sale</a></li>
            <li><a href="#tabs-3">For Rent</a></li>
          </ul>
      </div><!-- end container -->
    </div><!-- end filter header -->

    <div class="container">
      <div id="tabs-2" class="ui-tabs-hide">
          <form id="search-sale" class="select-search-form">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select id="search_sale-type" name="property-type">
                      <option value="">All</option>
                      @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->contentDefault->name}}</option>
                        @endforeach
                      @endif
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select id="search_sale-location" name="location">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select id="search_sale-beds" name="beds" id="property-beds">
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
      
                <div class="filter-item filter-item-7">
                    <label>Price</label>
                    <div id="slider-price-sale" class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                      <span class="low-price"></span>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input type="submit" id="find-sale" class="button alt" value="Find Properties"/>
                </div>
          </form>
          <form id="refer-sale-search" class="prop-search-form" method="post">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input id="refer-val-sale" class="reference" type="text" name="reference-search" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input id="refer-find-btn" type="submit" class="button alt" value="Find Properties" />
              </div>
          </form>
      </div><!-- end tab 2 -->

      <div id="tabs-3" class="ui-tabs-hide">
          <form id="search-rent" class="select-search-form" method="post">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select id="search_rent-type" name="property-type">
                      <option value="">All</option>
                      @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->contentDefault->name}}</option>
                        @endforeach
                      @endif
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select id="search_rent-location" name="property-location">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select id="search_rent-beds" name="beds" id="property-beds">
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
      
                <div class="filter-item filter-item-7">
                    <label>Price</label>
                    <div id="price-rent" class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input id="find-rent-btn" type="submit" class="button alt" value="Find Properties" />
                </div>
          </form>
          <form id="refer-rent-search" class="prop-search-form" method="post">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input id="refer-val-rent" class="reference" name="reference-search-rent" type="text" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input id="refer-find-btn-rent" type="submit" class="button alt" value="Find Properties" />
              </div>
          </form>
      </div><!-- end tab 3 -->

    </div><!-- end container -->
  </div><!-- end tabs -->
</section>


<section class="module properties">
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 sale-home-list">
            <div class="module-header">
                <h2>Sales</h2>
                <img src="/realstate/images/divider.png" alt="" />
            </div>
            <div class="row">
                @foreach($sales_properties as $sales_property)
                    <div class="col-lg-12 col-md-12">
                        <div class="property shadow-hover">
                        <a href="/property/{{$sales_property->alias}}" class="property-img">
                            <div class="img-fade"></div>
                            <div class="property-tag lable-sale featured">Sale</div>
                            <div class="property-price">₤{{ $sales_property->prices['service_charge'] }}</div>
                            <div class="property-color-bar"></div>
                            <div class="prop-img-home">
                                <img src="{{ $sales_property->imageByStatus }}" alt="" />
                            </div>
                        </a>
                        <div class="property-content">
                            <div class="property-title">
                            <h4><a href="/property/{{$sales_property->alias}}">{{ $sales_property->contentload->name }}</a></h4>
                            </div>
                            <table class="property-details">
                            <tr>
                                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $sales_property->category->contentDefault->name }}</td>
                                <td><i class="fa fa-bed"></i>{{ $sales_property->rooms }}</td>
                                <td><i class="fa fa-expand"></i>{{ $sales_property->property_info['internal_area'] }}</td>
                                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $sales_property->guest_number }}</td>
                            </tr>
                            </table>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="center"><a href="{{ route('sale') }}" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Sales</a></div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 rentals-home-list">
            <div class="module-header">
                <h2>Rentals</h2>
                <img src="/realstate/images/divider.png" alt="" />
            </div>
            <div class="row">
            @foreach($rentals_properties as $rentals_property)
                <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                        <a href="/property/{{$sales_property->alias}}" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-rent featured">Rent</div>
                        <div class="property-price">
                          <div >
                          ₤{{ $rentals_property->prices['month'] }} <span>monthly</span>
                          </div>
                          <div class="price-perWeek">
                          ₤{{ $rentals_property->prices['week'] }} <span>weekly</span>
                          </div>
                        </div>
                        <div class="property-color-bar"></div>
                        <div class="prop-img-home">
                            <img src="{{ $rentals_property->imageByStatus }}" alt="" />
                        </div>
                        </a>
                        <div class="property-content">
                        <div class="property-title">
                        <h4><a href="/property/{{$sales_property->alias}}">{{ $rentals_property->contentload->name }}</a></h4>
                        </div>
                        <table class="property-details">
                            <tr>
                                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $rentals_property->category->contentDefault->name }}</td>
                                <td><i class="fa fa-bed"></i>{{ $rentals_property->rooms }}</td>
                                <td><i class="fa fa-expand"></i>{{ $rentals_property->property_info['internal_area'] }}</td>
                                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $rentals_property->guest_number }}</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                 </div>
                 @endforeach
            
            <div class="center"><a href="{{ route('rent') }}" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Rentals</a></div>
            </div><!-- end row -->
        </div>
      </div> 
  </div><!-- end container -->
</section>

@endsection