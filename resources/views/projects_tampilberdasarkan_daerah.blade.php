<!DOCTYPE html>
<html lang="en">
<head>
<title>Terumbu karang</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Vegetable Farm Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- css links -->
<link href="{{ asset('frontend2/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/typo.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/hoverex-all.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/inner.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/pogo-slider.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/caption-hover.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/circle-hover.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/slider.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('frontend2/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- /css links -->
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- font files -->
<!-- js files  -->
<script src="{{ asset('frontend2/js/SmoothScroll.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend2/js/modernizr.custom.js')}}"></script>
<!-- /js files -->
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Terumbu Karang</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('index/') }}">Home</a></li>
				<li class="active"><a href="{{ url('projects_new/') }}">Projects</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- /Fixed navbar -->
<!-- banner section -->
<div class="pogoSlider" id="js-main-slider">
	<div class="pogoSlider-slide" data-transition="barRevealDown" data-duration="1000"  style="background-image:url(/frontend2/images/wembley-296066-unsplash.jpg);">
		<div class="pogoSlider-slide-element">
			<h3>Check Out Our Projects</h3>
		</div>
	</div>
	<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1000" style="background-image:url(/frontend2/images/syd-sujuaan-539669-unsplash.jpg);">
		<div class="pogoSlider-slide-element">
			<h3>Check Out Our Projects</h3>
		</div>
	</div>
	<div class="pogoSlider-slide" data-transition="barRevealDown" data-duration="1000" style="background-image:url(/frontend2/images/milos-prelevic-509789-unsplash.jpg);">
		<div class="pogoSlider-slide-element">
			<h3>Check Out Our Projects</h3>
		</div>
	</div>
	<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1000"  style="background-image:url(/frontend2/images/mei-featherstone-531224-unsplash.jpg);">
		<div class="pogoSlider-slide-element">
			<h3>Check Out Our Projects</h3>
		</div>
	</div>
</div>
<!-- /banner section -->
<!-- blog content -->
<section class="blog-w3ls">
	<div class="container">
		<h3 class="text-center slideanim">Our Projects</h3>
		<p class="text-center slideanim"></p>
		<div class="row">
			<!-- BLOG POSTS LIST -->
			<div class="col-lg-8 slideanim">
				<!-- Blog Post 1 -->
        @foreach($nama as $namo)
				<a href="#">
					<div class="hover01 column">
						<div>
							<figure><img class="img-responsive" src="{{ asset('/images/project/'.$namo['image'])  }}" alt="Vegetable Farm" title="Vegetable Farm"></figure>
						</div>
					</div>
				</a>
				<a href="blogpost.html" class="blog-link"><h3 class="ctitle">{{ $namo['title'] }}</h3></a>
				<p class="blog-p1"><small>{{ $namo['created_at'] }}</small> | By: {{ $namo['created_by'] }} | location: {{$namo['nama_daerah']}}</p>
				<p class="blog-p2">{{ substr(strip_tags($namo['body']), 0, 300) }}{{ strlen(strip_tags($namo['body'])) > 300 ? "..." : "" }}</p>
				<p class="blog-p3"><a href="{{ url('projects/'.$namo['id']) }}" class="btn-outline">Read More</a></p>
				<div class="hline"></div>
				<div class="spacing"></div>
        @endforeach
			</div><!-- /col-lg-8 -->

			<!-- SIDEBAR -->
			<div class="col-lg-4 slideanim">

				<h4>Daerah yang diteliti</h4>
				<div class="hline"></div>
        @foreach($daer as $daerah)
				<p class="blog-p4"><a href="{{ url('dae/'.$daerah['id']) }}"><i class="fa fa-angle-right"></i>{{ $daerah->nama_daerah }}</a></p>
				@endforeach
				<div class="spacing"></div>

			</div>
		</div><!-- /row -->
    <div class="row">
		<div class="blog-p3">
			<div class="btn-outline">
				<div class="text-center">
					{!! $daerahs->links() !!}
				</div>
			</div>
		</div>
	</div>
	</div><!-- /container -->
</section>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h4>Berbuat Baik kepada Terumbu Karang</h4>
                    <p>Melindungi terumbu karang <i class="fa fa-pagelines" aria-hidden="true"></i> Melestarikan ekosistem laut</p>
                </div>
                <div class="footer-col col-md-4">
                    <h4>Around the Web</h4>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h4>About Coral Refs</h4>
                    <p>Terumbu karang (Coral reef) merupakan kelompok organisme yang hidup didasar perairan laut dangkal, terutama di daerah tropis. Meskipun karang ditemukan hampir di seluruh dunia, baik perairan kutub maupun perairan ugahari, tetapi hanya di daerah tropis terumbu karang dapat berkembang. Karenanya pembentukan terumbu karang digunakan untuk membasahi lingkungan lautan tropis (Ghufron M. H. Kordi K., 2010)</p>
                </div>
            </div>
        </div>
	</div>

</footer>
<!-- js files -->
<script src="{{ asset('frontend2/js/jquery.min.js')}}"></script>
<script src="{{ asset('frontend2/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend2/js/classie.js')}}"></script>
<script src="{{ asset('frontend2/js/TweenMax.min.js')}}"></script>
<script src="{{ asset('frontend2/js/index2.js')}}"></script>
<script src="{{ asset('frontend2/js/jquery.pogo-slider.min.js')}}"></script>
<script src="{{ asset('frontend2/js/main2.js')}}"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
<script>
$(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});
</script>

<script src="{{ asset('frontend2/js/retina-1.1.0.js')}}"></script>
<script src="{{ asset('frontend2/js/jquery.hoverex.min.js')}}"></script>
<!-- /js files -->
</body>
</html>
