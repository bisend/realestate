@extends('realstate.layout')

@section('mainsection')

<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="property-single-item property-main">
				<div class="property-header">
					<div class="property-title">
						<h4>Modern Family Home</h4>
            <div class="property-price-single right">$255,000 <span>Per Month</span></div>
            <div class="clear"></div>
					</div>
					<div class="property-single-tags">
						<div class="property-tag lable-sale featured">Sale</div>
						<div class="property-tag lable-rent featured">Rent</div>
						<div class="property-type right">Property Type: <a href="#">Family Home</a></div>
					</div>
				</div>

				<table class="property-details-single">
					<tr>
						<td><i class="fa fa-home" aria-hidden="true"></i> <span>3</span> Beds</td>
						<td><i class="fa fa-bed"></i></i> <span>2</span> Baths</td>
						<td><i class="fa fa-expand"></i> <span>25,000</span> Sq Ft</td>
						<td><i class="fa fa-user" aria-hidden="true"></i> <span>1</span> PErson</td>
					</tr>
				</table>

        <div class="property-gallery">
          <div class="slider-nav slider-nav-property-gallery">
            <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
            <span class="slider-next"><i class="fa fa-angle-right"></i></span>
          </div>
          <div class="slide-counter"></div>
          <div class="slider slider-property-gallery">
            <div class="slide"><img src="images/testimg/test1.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test2.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test3.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test4.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test1.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test2.jpg" alt="" /></div>
            <div class="slide"><img src="images/testimg/test3.jpg" alt="" /></div>
          </div>
          <div class="slider property-gallery-pager">
            <a class="property-gallery-thumb"><img src="images/testimg/test1.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test2.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test3.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test4.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test1.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test2.jpg" alt="" /></a>
            <a class="property-gallery-thumb"><img src="images/testimg/test3.jpg" alt="" /></a>
          </div>
        </div>

			</div><!-- end property title and gallery -->

			<div class="widget property-single-item property-description content">
				<h4>
					<span>Description</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam 
				in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut 
				tristique elit risus at metus. Sed fermentum, lorem vitae efficitur imperdiet, neque velit tristique turpis, et iaculis 
				mi tortor finibus turpis.
				</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. 
				Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. 
				Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, 
				a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper 
				placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. 
				Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet 
				tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.</p>

				<div class="tabs">
			        <ul>
			          <li><a href="#tabs-1"><i class="fa fa-pencil icon"></i>Additional Details</a></li>
			          <li><a href="#tabs-3"><i class="fa fa-files-o icon"></i>Attachments</a></li>
			        </ul>
			        <div id="tabs-1" class="ui-tabs-hide">
			          <ul class="additional-details-list">
			          	<li>Property Reference: <span>11234</span></li>
			          	<li>Property Type: <span>Rent</span></li>
			          	<li>Internal Area: <span>Single Family Home</span></li>
			          	<li>External Area: <span>2001</span></li>
			          	<li>Bathrooms: <span>5</span></li>
			          	<li>Bedrooms: <span>5</span></li>
			          </ul>
			        </div>

			        <div id="tabs-3" class="ui-tabs-hide">
			          <a href="#"><i class="fa fa-file-o icon"></i> Lease Agreement</a><br/><br/>
			          <a href="#"><i class="fa fa-file-o icon"></i> Brochure</a><br/><br/>
			          <a href="#"><i class="fa fa-file-o icon"></i> Property Details</a>
			        </div>
			    </div>
			</div><!-- end description -->

			<div class="widget property-single-item property-amenities">
				<h4>
					<span>Amenities</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<ul class="amenities-list">
					<li><i class="fa fa-check icon"></i> Parking</li>
					<li><i class="fa fa-check icon"></i> Furnished</li>
					<li><i class="fa fa-check icon"></i> Pool</li>
					<!-- <li><i class="fa fa-check icon"></i> Dishwasher</li>
					<li><i class="fa fa-check icon"></i> Heating</li>
					<li><i class="fa fa-close icon"></i> Internet</li>
					<li><i class="fa fa-check icon"></i> Parking</li>
					<li><i class="fa fa-check icon"></i> Pool</li>
					<li><i class="fa fa-check icon"></i> Oven</li>
					<li><i class="fa fa-close icon"></i> Gym</li>
					<li><i class="fa fa-check icon"></i> Laundry Room</li> -->
				</ul>
			</div><!-- end amenities -->

			<div class="widget property-single-item property-location">
				<h4>
					<span>Location</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div id="map-single"></div>
			</div><!-- end location -->

			

			<div class="widget property-single-item property-related">
				<h4>
					<span>Related Properties</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>

				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="property shadow-hover">
						<a href="#" class="property-img">
								<div class="img-fade"></div>
								<div class="property-tag lable-sale featured">Sale</div>
								<div class="property-price">$150,000</div>
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
								<div class="property-price">$150,000</div>
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
			  <h4><span>Advanced Search</span> <img src="images/divider-half-white.png" alt="" /></h4>
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
			  <h4><span>Recent Properties</span> <img src="images/divider-half.png" alt="" /></h4>
			  <div class="widget-content">

				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="#">Beautiful Waterfront Condo</a></h5>
					  <p><strong>$1,800</strong> Per Month</p>
					</div>
				  </div>
				</div>

				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="#">Family Home</a></h5>
					  <p><strong>$500,000</strong></p>
					</div>
				  </div>
				</div>

				<div class="recent-property">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					  <h5><a href="#">Ubran Apartment</a></h5>
					  <p><strong>$1,800</strong> Per Month</p>
					</div>
				  </div>
				</div>

			  </div><!-- end widget content -->
			</div><!-- end widget -->

      <div class="widget widget-sidebar recent-posts">
          <h4><span>Recent Blog Posts</span> <img src="images/divider-half.png" alt="" /></h4>
          <div class="widget-content">

          <div class="recent-property">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <h5><a href="#">6 Tips to help you sell your house</a></h5>
              <p><i class="fa fa-calendar-o"></i> Feb, 18th 2017</p>
            </div>
            </div>
          </div>

          <div class="recent-property">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <h5><a href="#">Common mistakes to avoid when moving </a></h5>
              <p><i class="fa fa-calendar-o"></i> Feb, 18th 2017</p>
            </div>
            </div>
          </div>

          <div class="recent-property">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="images/1837x1206.png" alt="" /></a></div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <h5><a href="#">How to design a minimal but productive home office </a></h5>
              <p><i class="fa fa-calendar-o"></i> Feb, 18th 2017</p>
            </div>
            </div>
          </div>

          </div><!-- end widget content -->
      </div><!-- end widget -->
			
		
		</div><!-- end sidebar -->
		
	</div><!-- end row -->

  </div><!-- end container -->
</section>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqb3fT3SbMSDMggMEK7fJOIkvamccLrjA&sensor=false"></script>
<script src="js/map-single.js"></script> <!-- google maps -->

<script>
  var mapOptions = {
    zoom: 13,
    scrollwheel: false,
    center: new google.maps.LatLng(50.642543, 26.204113)
  };
</script>

@endsection