
	<!-- about -->
	<div class="banner-bottom-w3l" id="about">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>S</span>elamat Datang
				</h3>
				<div class="tittle-style">
				</div>
				<p>Selamatkan terumbu karang maka terumbu karang akan menyelamatkanmu</p>
			</div>
			<div class="welcome-sub-wthree">
				<div class="col-md-5 banner_bottom_left">
					<h4>{{ $nama['title'] }}

					</h4>
					<p style="text-align: justify;">{{ substr(strip_tags($nama['body']), 0, 500) }}{{ strlen(strip_tags($nama['body'])) > 500 ? "..." : "" }}</p>
					<h6 class="w3l-style">W3layouts</h6>
				</div>
				<!-- Stats-->
				<div class="col-md-7 stats-info-agile" style="background-image: url('{{ asset('/images/welcome/'.$nama['image']) }}');">

				</div>
				<!-- //Stats -->
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
