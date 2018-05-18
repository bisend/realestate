@extends('realstate.layout')

@section('mainsection')

    <!-- <section class="subheader">
  <div class="container">
    <h1>Blog Single</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#">Blog</a> <i class="fa fa-angle-right"></i> <a href="#" class="current">Blog Single</a></div>
    <div class="clear"></div>
  </div>
</section> -->

<section class="module">
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="blog-post">
          <a href="#" class="blog-post-img">
            <div class="img-fade"></div>
            <div class="blog-post-date"><span>11</span>FEB</div>
            <img src="images/1400x595.png" alt="" />
          </a>
          <div class="content blog-post-content">
            <h3><a href="#">6 Tips to help you sell your house</a></h3>
           
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim pretium dui a lobortis. Etiam vel ex bibendum, posuere 
			leo in, varius mauris. Vestibulum eget lacinia diam. In eu eros sodales, luctus urna nec, posuere lorem. Cum sociis natoque penatibus 
			et magnis dis parturient montes, nascetur ridiculus mus. Fusce at mauris eget risus vehicula vestibulum at sit amet dui. Cras luctus 
			urna libero, quis ullamcorper libero lacinia eget.</p>

			<p>Nam porttitor nunc volutpat, bibendum mauris quis, volutpat diam. Nullam vehicula urna id lectus commodo feugiat. Suspendisse sit 
			amet pretium nisi, at placerat lorem. Nunc placerat sapien lectus. Maecenas in elit vitae lacus lacinia convallis sed non lectus. 
			Integer blandit elementum ipsum, ornare porttitor nulla gravida at. Maecenas maximus ac nisl sed euismod. Morbi fermentum augue vitae 
			eleifend iaculis. Nulla egestas ullamcorper mi, id eleifend arcu dignissim vel.</p>

			<h5>This is a Sub-Heading</h5>
			<p>Cras quis lobortis leo, vel varius neque. Donec iaculis, turpis in mattis posuere, ipsum lacus luctus augue, ut tristique quam dui 
			non elit. In a libero magna. Proin lacinia nulla a enim tempor congue. Cras augue ligula, vehicula nec suscipit convallis, hendrerit 
			ut arcu. Fusce iaculis nibh euismod velit ornare convallis. Etiam eu facilisis justo. Interdum et malesuada fames ac ante ipsum primis 
			in faucibus.</p>

			<div class="quote">Cras quis lobortis leo, vel varius neque. Donec iaculis, turpis in mattis posuere, ipsum lacus luctus augue, ut 
			tristique quam.</div>
			
			<h5>This is another Sub-Heading</h5>
			<p>Cras quis lobortis leo, vel varius neque. Donec iaculis, turpis in mattis posuere, ipsum lacus luctus augue, ut tristique quam dui 
			non elit. In a libero magna. Proin lacinia nulla a enim tempor congue. Cras augue ligula, vehicula nec suscipit convallis, hendrerit 
			ut arcu. Fusce iaculis nibh euismod velit ornare convallis. Etiam eu facilisis justo. Interdum et malesuada fames ac ante ipsum primis 
			in faucibus.</p>

			<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus risus urna, aliquet vitae turpis 
			eget, porttitor feugiat sem. Aliquam ultrices laoreet lorem, in condimentum turpis lobortis vel. Sed vestibulum augue sed massa 
			tincidunt iaculis. Cras eget efficitur ligula. Donec volutpat quam risus, vel vehicula ligula auctor non. In hac habitasse platea 
			dictumst. Donec at ipsum magna. Fusce consequat, ante commodo lacinia semper, magna diam aliquam lacus, in dictum est sem in turpis. 
			Vivamus leo turpis, commodo blandit egestas vel, blandit in quam. Nam id diam in arcu accumsan porta eget a nisi. Class aptent taciti 
			sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
			
          </div>
        </div><!-- end blog post -->
		
		<div class="widget blog-post-related">
			<h4><span>Related Posts</span> <img src="images/divider-half.png" alt="" /></h4>
			
			<div class="row">
			
        @for($i = 0; $i < 3; $i++)
        <div class="col-lg-4 col-md-4">
            <div class="blog-post blog-post-creative shadow-hover">
            <a href="#" class="blog-post-img">
                <div class="img-fade"></div>
                <div class="img-overlay"><i class="fa fa-quote-left"></i></div>
                <div class="blog-post-date"><span>11</span>FEB</div>
                <div class="blog-img-bg">
                    <img src="/realstate/images/testimg/test1.jpg" alt="" />
                </div>
            </a>
            <div class="content blog-post-content">
                <h3><a href="#">6 Tips to help you sell your house</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vehicula gravida hendrerit. Pellentesque at odio augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos...</p>
                <a href="#" class="button button-icon small grey"><i class="fa fa-angle-right"></i> Read More</a>
            </div>
            </div>
        </div>
        @endfor
			</div><!-- end row -->
			
		</div><!-- end related posts -->
		
    </div><!-- end blog posts -->
    </div>

  </div>
</section>

@endsection