@extends('realstate.layout')

@section('mainsection')

    <!-- <section class="module contact-details">
  <div class="container">

    <div class="row">
      <div class="col-lg-3 col-md-12">
        <div class="contact-item">
          <i class="fa fa-envelope"></i>
          <h4>Email Us</h4>
          <p>support@realstate.com</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="contact-item">
          <i class="fa fa-phone"></i>
          <h4>Call Us</h4>
          <ul class="contact-page-phones">
              <li>+20(800)030-96-74</li>
              <li>+20(800)030-96-74</li>
              <li>+20(800)030-96-74</li>
              <li>+20(800)030-96-74</li>
              <li>+20(800)030-96-74</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-12">
        <div class="contact-item">
          <i class="fa fa-share-alt"></i>
          <h4>Connect With Us</h4>
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section> -->


<section class="module">
  <div class="container">

    <div class="row">

      <div class="col-lg-8 col-md-8">

        <div class="comment-form">
          <h4><span>Quick Contact</span> <img src="/realstate/images/divider-half.png" alt="" /></h4>
          <!-- <p><b>Fill out the form below.</b> Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt auctor a ornare odio sedlon maurisvitae erat consequat auctor</p> -->
          <form method="post" id="contact-us">
            <div class="form-block">
              <label>Name *</label>
              <input id="contact-name" class="requiredField" type="text" placeholder="Your Name" name="name" />
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-block">
                  <label>Email *</label>
                  <input id="contact-email" class="email requiredField" type="text" placeholder="Your email" name="email" />
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-block">
                  <label>Phone *</label>
                  <input id="contact-phone" type="text" placeholder="Your phone" name="phone" />
                </div>
              </div>
            </div>
            <!-- <div class="form-block">
                <label>Subject</label>
                <input id="contact-subject" type="text" placeholder="Subject" name="subject" />
            </div> -->
            <div class="form-block">
              <label>Message *</label>
              <textarea id="contact-message" class="requiredField" placeholder="Your message..." name="message"></textarea>
            </div>

             <!-- <div class="recaptcha-div">
                <span id="recaptcha-error-callback">Please complete the verification!</span>
                <div class="recaptcha-style" id="contact-recaptcha"></div>
            </div> -->
            
            <div class="form-block">
              <input id="submit-contact-form" type="submit" value="Submit" />
            </div>
          </form>
        </div>

        <div class="divider"></div><br/>
        <!-- <h4>Still need help?</h4> -->
        <!-- <p>If you still have questions, try visiting our <a href="#"><b>FAQ</b></a> page to assit you. Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt auctor a ornare odio sedlon maurisvitae erat consequat auctor</p> -->

      </div>

      <div class="col-lg-4 col-md-4 sidebar">




      </div>

    </div><!-- end row -->

  </div><!-- end container -->
</section>


@endsection