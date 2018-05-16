@extends('realstate.layout')

@section('mainsection')

    <section class="subheader subheader-slider">
  <div class="slider-wrap">

    <div class="slider-nav slider-nav-simple-slider">
      <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
      <span class="slider-next"><i class="fa fa-angle-right"></i></span>
    </div>

    <div class="slider slider-simple slider-advanced">
     
      <div class="slide" style="background-image: url('/realstate/images/testimg/test1.jpg')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">$250,000</div>
          <div class="slide-content">
            <h1>Mordern Family Home</h1>
            <p><i class="fa fa-map-marker icon"></i>432 Smith Dr. Balitmore, MD</p>
            <p class="slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet est augue malesuada dictum. Nullam elementum dictum.</p>
            <table>
              <tr>
                <td><i class="fa fa-bed"></i><br/>3 Beds</td>
                <td><i class="fa fa-expand"></i><br/>Type</td>
              </tr>
            </table>
            <span class="lable-rent right mobile-lable-flout">Rent</span>
            <a href="#" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>
      
      <div class="slide" style="background-image: url('/realstate/images/testimg/test2.jpg')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">$8,000</div>
          <div class="slide-content">
            <h1>Beautiful Waterfront Home</h1>
            <p><i class="fa fa-map-marker icon"></i>432 Smith Dr. Balitmore, MD</p>
            <p class="slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet est augue malesuada dictum. Nullam elementum dictum.</p>
            <table>
              <tr>
                <td><i class="fa fa-bed"></i><br/>3 Beds</td>
                <td><i class="fa fa-expand"></i><br/>Type</td>
              </tr>
            </table>
            <span class="lable-sale right mobile-lable-flout">For Sale</span>
            <a href="#" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>

      <div class="slide" style="background-image: url('/realstate/images/testimg/test3.jpg')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">$8,000</div>
          <div class="slide-content">
            <h1>Beautiful Waterfront Home</h1>
            <p><i class="fa fa-map-marker icon"></i>432 Smith Dr. Balitmore, MD</p>
            <p class="slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet est augue malesuada dictum. Nullam elementum dictum.</p>
            <table>
              <tr>
                <td><i class="fa fa-bed"></i><br/>3 Beds</td>
                <td><i class="fa fa-expand"></i><br/>Type</td>
              </tr>
            </table>
            <span class="lable-sale right mobile-lable-flout">For Sale</span>
            <a href="#" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>

      <div class="slide" style="background-image: url('/realstate/images/testimg/test4.jpg')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">$8,000</div>
          <div class="slide-content">
            <h1>Beautiful Waterfront Home</h1>
            <p><i class="fa fa-map-marker icon"></i>432 Smith Dr. Balitmore, MD</p>
            <p class="slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet est augue malesuada dictum. Nullam elementum dictum.</p>
            <table>
              <tr>
                <td><i class="fa fa-bed"></i><br/>3 Beds</td>
                <td><i class="fa fa-expand"></i><br/>Type</td>
              </tr>
            </table>
            <span class="lable-sale right mobile-lable-flout">For Sale</span>
            <a href="#" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>
    
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
          <form class="select-search-form" method="get">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select name="property-type">
                      <option value="">All</option>
                      <option value="1">Apartment</option>
                      <option value="2">Berth / Mooring</option>
                      <option value="3">Building Plot</option>
                      <option value="4">Hotel</option>
                      <option value="5">Penthouse</option>
                      <option value="6">Restaurant</option>
                      <option value="7">Rural Land</option>
                      <option value="8">Townhouse</option>
                      <option value="9">Villa</option>
                      <option value="10">Village House</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select name="property-type">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select name="beds" id="property-beds">
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
                    <div class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input type="submit" class="button alt" value="Find Properties" />
                </div>
          </form>
          <form class="prop-search-form" action="">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input class="reference" type="text" name="reference-search" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input type="submit" class="button alt" value="Find Properties" />
              </div>
          </form>
      </div><!-- end tab 2 -->

      <div id="tabs-3" class="ui-tabs-hide">
          <form class="select-search-form" method="get">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select name="property-type">
                      <option value="">All</option>
                      <option value="1">Apartment</option>
                      <option value="2">Berth / Mooring</option>
                      <option value="3">Building Plot</option>
                      <option value="4">Hotel</option>
                      <option value="5">Penthouse</option>
                      <option value="6">Restaurant</option>
                      <option value="7">Rural Land</option>
                      <option value="8">Townhouse</option>
                      <option value="9">Villa</option>
                      <option value="10">Village House</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select name="property-type">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select name="beds" id="property-beds">
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
                    <div class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input type="submit" class="button alt" value="Find Properties" />
                </div>
          </form>
          <form class="prop-search-form" action="">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input class="reference" type="text" name="reference-search" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input type="submit" class="button alt" value="Find Properties" />
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
                <img src="images/divider.png" alt="" />
            </div>
            <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-sale featured">Sale</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-sale featured">Sale</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-sale featured">Sale</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-sale featured">Sale</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-sale featured">Sale</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="center"><a href="#" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Sales</a></div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 rentals-home-list">
            <div class="module-header">
                <h2>Rentals</h2>
                <img src="images/divider.png" alt="" />
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12">
                  <div class="property shadow-hover">
                    <a href="#" class="property-img">
                      <div class="img-fade"></div>
                      <div class="property-tag lable-rent featured">Rent</div>
                      <div class="property-price">$150,000</div>
                      <div class="property-color-bar"></div>
                      <div>
                          <img src="/realstate/images/1837x1206.png" alt="" />
                      </div>
                    </a>
                    <div class="property-content">
                      <div class="property-title">
                      <h4><a href="#">Modern Family Home</a></h4>
                        <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                      </div>
                      <table class="property-details">
                        <tr>
                          <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                      <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-rent featured">Rent</div>
                        <div class="property-price">$150,000</div>
                        <div class="property-color-bar"></div>
                        <div>
                            <img src="/realstate/images/1837x1206.png" alt="" />
                        </div>
                      </a>
                      <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">Modern Family Home</a></h4>
                          <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                        </div>
                        <table class="property-details">
                          <tr>
                            <td><i class="fa fa-bed"></i> 3 Beds</td>
                            <td><i class="fa fa-expand"></i>Type</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12">
                      <div class="property shadow-hover">
                        <a href="#" class="property-img">
                          <div class="img-fade"></div>
                          <div class="property-tag lable-rent featured">Rent</div>
                          <div class="property-price">$150,000</div>
                          <div class="property-color-bar"></div>
                          <div>
                              <img src="/realstate/images/1837x1206.png" alt="" />
                          </div>
                        </a>
                        <div class="property-content">
                          <div class="property-title">
                          <h4><a href="#">Modern Family Home</a></h4>
                            <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                          </div>
                          <table class="property-details">
                            <tr>
                              <td><i class="fa fa-bed"></i> 3 Beds</td>
                              <td><i class="fa fa-expand"></i>Type</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="property shadow-hover">
                          <a href="#" class="property-img">
                            <div class="img-fade"></div>
                            <div class="property-tag lable-rent featured">Rent</div>
                            <div class="property-price">$150,000</div>
                            <div class="property-color-bar"></div>
                            <div>
                                <img src="/realstate/images/1837x1206.png" alt="" />
                            </div>
                          </a>
                          <div class="property-content">
                            <div class="property-title">
                            <h4><a href="#">Modern Family Home Modern Family Home Modern Family Home</a></h4>
                              <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                            </div>
                            <table class="property-details">
                              <tr>
                                <td><i class="fa fa-bed"></i> 3 Beds</td>
                                <td><i class="fa fa-expand"></i>Type</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                          <div class="property shadow-hover">
                            <a href="#" class="property-img">
                              <div class="img-fade"></div>
                              <div class="property-tag lable-rent featured">Rent</div>
                              <div class="property-price">$150,000</div>
                              <div class="property-color-bar"></div>
                              <div>
                                  <img src="/realstate/images/1837x1206.png" alt="" />
                              </div>
                            </a>
                            <div class="property-content">
                              <div class="property-title">
                              <h4><a href="#">Modern Family Home</a></h4>
                                <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
                              </div>
                              <table class="property-details">
                                <tr>
                                  <td><i class="fa fa-bed"></i> 3 Beds</td>
                                  <td><i class="fa fa-expand"></i>Type</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                  <div class="center"><a href="#" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Rentals</a></div>
            </div><!-- end row -->
        </div>
      </div> 
  </div><!-- end container -->
</section>

@endsection