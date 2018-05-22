
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME PAGE</title>

  <!-- CSS file links -->
  <link href="/realstate/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/realstate/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="/realstate/assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="/realstate/assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="/realstate/assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="/realstate/css/nouislider.min.css" rel="stylesheet">
  <link href="/realstate/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/realstate/css/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

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
</head>
<body>

@include('realstate.modals.success')

    <div class="contact-form-fix Register-Interest form-active-registr">
        <div class="show-btn-wrapper">
            <button class="show-register"><i class="fa fa-envelope" aria-hidden="true"></i></button>
        </div>
        <div class="fix-form-header">
            Register Interest
        </div>
        <form action="" id="register-interest-form" methods="post">
            <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
            <label for="name">Name:</label>
            <input type="text" placeholder="Name" name="name" id="register-name">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" name="email" id="register-email">

             <label for="phone">Phone Number:</label>
            <input type="text" placeholder="Phone Number" name="phone" id="register-phone">
            
            <div class="recaptcha-div">
                <span id="recaptcha-error-reg">Please complete the verification!</span>
                <div class="recaptcha-style" id="reg-back-captcha"></div>
            </div>

            <button id="send-register-form" class="button button-icon alt small"><i class="fa fa-envelope" aria-hidden="true"></i>Send</button>
        </form>
    </div>

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

    @include('realstate.header')

    @yield('mainsection')

    @include('realstate.footer')

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





    


</body>
</html>