

<!-- projects -->
<br>
<div class="gallery-agile" id="projects">
  <div class="title-div">
    <h3 class="tittle">
      <span>O</span>ur Projects
    </h3>
    <div class="tittle-style">
    </div>
  </div>

  <div class="gallery-agile-kmsrow">
    @foreach($nama5 as $namo)
    <div class="col-xs-3 gallery-agile-grids">
      <div class="portfolio-hover">
        <a href="{{ asset('/images/project/'.$namo['image'])  }}" data-lightbox="example-set"
        data-title="Title &emsp; &emsp; &emsp; &emsp; &nbsp;      : {{ $namo['title'] }}
                    <br>
                    Tahun &emsp;&emsp;&emsp;&emsp;&emsp;: {{ $namo['tahun'] }}
                    <br>
                    Karang hidup &emsp;  : {{ $namo['karang_hidup'] }}
                    <br>
                    Karang Mati &emsp; &nbsp;   : {{ $namo['karang_mati'] }}
                    <br>
                    Deskripsi &emsp; &emsp; &nbsp;    :<br> {{ substr(strip_tags($namo['body']), 0, 1000) }}
                    <br>
                    <br>
                    Created by &emsp; &emsp;   : {{ $namo['created_by'] }}">

          <img src="{{ asset('/images/project/'.$namo['image'])  }}" class="img-responsive zoom-img" style="max-height:auto;max-width:100%;">

          <a href="{{ url('projects/'.$namo['id']) }}" class="tombol">Read More</a>
        </a>
      </div>
    </div>
    @endforeach
    <div class="clearfix"> </div>
  </div>

  <div class="row">
		<div class="blog-p3">
			<div class="btn-outline">
				<div class="text-center">
					{!! $projects->links() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //projects -->
