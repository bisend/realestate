<?php $__env->startSection('mainsection'); ?>

    <section class="subheader">
  <div class="container">
    <h1>Blog Creative</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Blog</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module">
  <div class="container">
    
    <div class="row grid-blog">

        <?php for($i = 0; $i < 9; $i++): ?>
        <div class="col-lg-4 col-md-4">
            <div class="blog-post blog-post-creative shadow-hover">
            <a href="#" class="blog-post-img">
                <div class="img-fade"></div>
                <div class="img-overlay"><i class="fa fa-quote-left"></i></div>
                <div class="blog-post-date"><span>11</span>FEB</div>
                <img src="/realstate/images/testimg/test1.jpg" alt="" />
            </a>
            <div class="content blog-post-content">
                <h3><a href="#">6 Tips to help you sell your house</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vehicula gravida hendrerit. Pellentesque at odio augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos...</p>
                <a href="#" class="button button-icon small grey"><i class="fa fa-angle-right"></i> Read More</a>
            </div>
            </div>
        </div>
        <?php endfor; ?>
      
    </div><!-- end row -->

   <?php echo $__env->make('realstate.partials.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </div><!-- end container -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('realstate.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>