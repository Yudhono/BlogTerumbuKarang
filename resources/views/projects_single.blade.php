<!DOCTYPE html>
<html lang="en">
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
	<!-- about -->
	<div class="banner-bottom-w3l" id="about">
	  <div class="container">
	    <div class="title-div"  style="margin-bottom:15px;">
	      <h3 class="tittle">
	        {{ $nama['title'] }}
	      </h3>
	      <div class="tittle-style">
	      </div>
	    </div>
	    <div class="welcome-sub-wthree">

	      <div class="row">
	        <div class="col-lg-12" style="text-align: center;">
	          <img src="{{ asset('/images/project/'.$nama['image'])  }}" style="max-height:800px;max-width:800px; display: inline-block;">
	        </div>
	      </div>

	      <div class="row">
	        <!-- <h4>

	        </h4> -->
	        <p style="text-align: justify;">{{ substr(strip_tags($nama['body']), 0) }}</p>
	        <br>
	        <p>nama daerah&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $nama['nama_daerah'] }}</p>
	        <p>tahun&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $nama['tahun'] }}</p>
	        <p>karang hidup&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; :{{ $nama['karang_hidup'] }}</p>
	        <p>karang mati &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; :{{ $nama['karang_mati'] }}</p>
	        <p>pasir &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:{{ $nama['pasir'] }}</p>
	        <p>total karang dan pasir &emsp; &emsp; :{{ $nama['total'] }}</p>
	        <p>tutupan terumbu karang &emsp; :{{ $nama['tutupan'] }}</p>
	        <br>
	        <p><b>Keputusan</b>              :<br>{!! $nama['keputusan'] !!}</p>
	      </div>

							<div class="row">
								<div class="col-md-8 col-md-offset-2 view-form-2">
									<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $project2->comments()->count() }} Comments</h3>
									@foreach($project2->comments as $comment)
										<div class="comment" id="komentar">
											<div class="author-info">

												<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
												<div class="author-name">
													<h4>{{ $comment->name }}</h4>
													<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
												</div>

											</div>

											<div class="comment-content">
												{{ $comment->comment }}
											</div>

										</div>
									@endforeach
								</div>
							</div>

							<div class="row">
								<div id="comment-form" class="comment-w3ls view-form" style="margin-top: 50px;">

									<div class="well">
									{{ Form::open(['url' => ['comments', $project2->id], 'method' => 'POST'], array('type' => 'hidden', 'id' => 'project_id', 'value' => '$project2->id')) }}

										<div class="row">
											<div class="col-md-6">
												{{ Form::label('name', "Name:") }}
												{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
											</div>

											<div class="col-md-6">
												{{ Form::label('email', 'Email:') }}
												{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
											</div>

											<div class="col-md-12">
												{{ Form::label('comment', "Comment:") }}
												{{ Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'comment', 'rows' => '5']) }}

												{{ Form::submit('Add Comment', ['id' => 'tombolSubmit', 'class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
											</div>
										</div>

									{{ Form::close() }}
								</div>

								</div>
							</div>

	      <div class="clearfix"> </div>

	    </div>
	  </div>
	</div>
	<!-- //about -->

	<!-- video section -->
	<div class="video-w3l" data-vide-bg="{{ asset('frontend/video/4')}}">
	  <h5>Save Coral Reefs, Clean Environment, Healthy Thinking, Happy Life & Green Earth</h5>
	  <a href="#small-dialog4" class="play-icon popup-with-zoom-anim ">
	    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
	  </a>
	  <div id="small-dialog4" class="mfp-hide w3ls_small_dialog wthree_pop">
	    <iframe src="https://player.vimeo.com/video/19251347"></iframe>
	  </div>
	</div>
	<!-- //video section -->

	<!-- footer -->
	<div class="footer-bot" style="margin-top:0em !important;">
	  <div class="w3layouts-newsletter">


	    <div class="clearfix"> </div>
	  </div>
	  <div class="container">
	    <div class="col-xs-3 logo2">
	      <h2>
	        <a href="index.html">
	          <span>T</span>erumbu
	          <span>K</span>arang</a>
	      </h2>
	    </div>
	    <div class="col-xs-9 ftr-menu">
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
	          <a class="scroll" href="#projects">Pemetaan</a>
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
	<!-- script for ajax comment post -->
	<script>
				jQuery( document ).ready( function( $ ) {

					$('#comment-form').on('submit', function(e) {
						$( '.view-form' ).fadeIn();
						$( '.view-form-2' ).fadeIn();
				       e.preventDefault();
				       var name = $('#name').val();
				       var email = $('#email').val();
							 var comment = $('#comment').val();
				       var project_id = $('#project_id').val();
							 var url = '{{url("comments/:param1")}}';
				       url = url.replace( ':param1', project_id );

				       $.ajax({
				           type: "POST",
				           url: '/comment/' + project_id,
				           data: {name:name, email:email, comment:comment, project_id:project_id}
				           success: function( msg ) {
				               $("body").append("<div>"+msg+"</div>");
				           }
				       });
				   });
			});
	</script>

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
