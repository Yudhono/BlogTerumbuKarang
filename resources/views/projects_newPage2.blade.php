<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Terumbu Karang</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Green Life web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
	<!-- Bootstrap-css -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" type="text/css" media="all" />
	<!-- Style-css -->
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css')}}">
	<!-- Font-Awesome-Icons-css -->
	<link href="{{ asset('frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Popup css (for Video Popup) -->
	<link rel="stylesheet" href="{{ asset('frontend/css/lightbox.css')}}" type="text/css" media="all">
	<!-- Lightbox css (for Projects) -->
	<link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css')}}" type="text/css" media="screen" property="" />
	<!-- Flexslider css (for Testimonials) -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Economica:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Rasa:300,400,500,600,700" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-agile">
		<!-- banner -->
		<div class="agile-top">
			<div class="col-xs-4 logo">
				<h1>
					<a href="index.html">
						<span>T</span>erumbu
						<span>K</span>arang</a>
				</h1>
			</div>
			<div class="col-xs-6 header-w3l">

			</div>

			@include('partials.navbar')

		</div>
	</div>
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Green Life! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->

	<!-- banner-text -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="w3layouts-banner-top banner" style="background-image: url('{{ asset('/images/banner/'.$nama4['image']) }}');">
						<div class="container">
							<div class="agileits-banner-info">
								<h3>{{ $nama4['title'] }}</h3>
								<p>{{ $nama4['subtitle_1'] }}
									<i class="fa fa-pagelines" aria-hidden="true"></i> {{ $nama4['subtitle_2'] }}</p>
								<div class="video-pop-wthree">
									<a href="#small-dialog1" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Watch Our Video</a>
									<div id="small-dialog1" class="mfp-hide w3ls_small_dialog wthree_pop">
										<iframe src="https://player.vimeo.com/video/19251347"></iframe>
									</div>
								</div>
								<div class="thim-click-to-bottom">
									<a href="#about" class="scroll">
										<i class="fa  fa-chevron-down"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		<!-- //banner-text -->
	</div>
  <br>
	<!-- //banner -->

	@include('projects')

<!-- footer -->
<div class="footer-bot">

    <div class="col-md-7 agileinfo-newsletter">
      <h3>
        <i class="fa fa-search" aria-hidden="true"></i>search our project here</h3>
      <form action="{{ route('searching') }}" method="GET">
        <input type="text" placeholder="Search here" name="search" required="">
        <input type="submit" value="search">
      </form>
    </div>


  <div class="container">
    <div class="col-xs-2 logo2">
      <h2>
        <a href="index.html">
          <span>T</span>erumbu
          <span>K</span>arang</a>
      </h2>
    </div>

    <div class="col-xs-8 ftr-menu">
      <ul>
        <li>
          <a href="/index">Home</a>
        </li>
        <li>
          <a class="scroll" href="#about">Terumbu Karang</a>
        </li>
        <li>
          <a class="scroll" href="#services">Pengetahuan</a>
        </li>
        <li>
          <a href="{{ url('projects_new/') }}" target="_blank">Projects</a>
        </li>

      </ul>
    </div>

    <div class="clearfix"></div>
    <div class="copy-right">
      <p> &copy; 2018 Green Life. All Rights Reserved | Design by
        <a href="http://w3layouts.com/"> W3layouts</a>
      </p>
    </div>
  </div>
</div>
<!-- //footer -->


<!-- js-scripts -->

<!-- jquery -->
<script src="{{ asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //jquery -->

<script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<!--  light box js -->
<script src="{{ asset('frontend/js/lightbox-plus-jquery.min.js')}}"></script>
<!-- //light box js-->

<!-- stats numscroller-js-file -->
<script src="{{ asset('frontend/js/numscroller-1.0.js')}}"></script>
<!-- //stats numscroller-js-file -->

<!-- Baneer-js -->
<script src="{{ asset('frontend/js/responsiveslides.min.js')}}"></script>
<script>
  // You can also use "$(window).load(function() {"
  $(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
      auto: true,
      pager: true,
      nav: false,
      speed: 500,
      namespace: "callbacks",
      before: function () {
        $('.events').append("<li>before event fired.</li>");
      },
      after: function () {
        $('.events').append("<li>after event fired.</li>");
      }
    });

  });
</script>
<!-- //Baneer-js -->

<!-- navigation -->
<script>
  (function ($) {
    // Menu Functions
    $(document).ready(function () {
      $('#menuToggle').click(function (e) {
        var $parent = $(this).parent('.menu');
        $parent.toggleClass("open");
        var navState = $parent.hasClass('open') ? "hide" : "show";
        $(this).attr("title", navState + " navigation");
        // Set the timeout to the animation length in the CSS.
        setTimeout(function () {
          console.log("timeout set");
          $('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
        }, 200);
        e.preventDefault();
      });
    });
  })(jQuery);
</script>
<!-- //navigation -->

<!-- pop-up(for video popup)-->
<script src="{{ asset('frontend/js/jquery.magnific-popup.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

  });
</script>
<!-- //pop-up-box (syllabus section video)-->

<!-- video js (background) -->
<script src="{{ asset('frontend/js/jquery.vide.min.js')}}"></script>
<!-- //video js (background) -->

<!-- smoothscroll -->
<script src="{{ asset('frontend/js/SmoothScroll.min.js')}}"></script>
<!-- //smoothscroll -->

<!-- password-script -->
<script>
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }

  function validatePassword() {
    var pass2 = document.getElementById("password2").value;
    var pass1 = document.getElementById("password1").value;
    if (pass1 != pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');
    //empty string means no validation error
  }
</script>
<!-- //password-script -->

<!-- start-smooth-scrolling -->
<script src="{{ asset('frontend/js/move-top.js')}}"></script>
<script src="{{ asset('frontend/js/easing.js')}}"></script>
<script>
  jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
      event.preventDefault();

      $('html,body').animate({
        scrollTop: $(this.hash).offset().top
      }, 1000);
    });
  });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth scrolling-bottom-to-top -->
<script>
  $(document).ready(function () {
    /*
      var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear'
      };
    */
    $().UItoTop({
      easingType: 'easeOutQuart'
    });
  });
</script>
<a href="#" id="toTop" style="display: block;">
  <span id="toTopHover" style="opacity: 1;"> </span>
</a>
<!-- //smooth scrolling-bottom-to-top -->

<!-- flexSlider (for testimonials) -->
<script defer src="{{ asset('frontend/js/jquery.flexslider.js')}}"></script>
<script>
  $(window).load(function () {
    $('.flexslider').flexslider({
      animation: "slide",
      start: function (slider) {
        $('body').removeClass('loading');
      }
    });
  });
</script>
<!-- //flexSlider (for testimonials) -->

<!-- //js-scripts -->

</body>

</html>
