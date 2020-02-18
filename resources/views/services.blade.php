

<!-- services -->
<div class="agileits-services" id="services">
  <div class="container">
    <div class="title-div">
      <h3 class="tittle">
        <span>P</span>usat Pengetahuan
      </h3>
      <div class="tittle-style">
      </div>
    </div>

    <div class="agileits-services-row">
      @foreach($nama2 as $nam)
      <div class="col-md-4 col-xs-6 agileits-services-grids">
        <div class="col-xs-3 wthree-ser">
          <img src="{{ asset('/images/pengetahuan/'.$nam['image'])  }}" style="max-height:70px;max-width:70px;margin-top:5px;">
        </div>
        <div class="col-xs-9 wthree-heading">
          <h4>{{ $nam['title'] }}</h4>
        </div>
        <div class="clearfix"></div>
        <p style="text-align:justify;">{{ substr(strip_tags($nam['body']), 0, 100) }}{{ strlen(strip_tags($nam['body'])) > 100 ? "..." : "" }}</p>
        <a href="#" data-toggle="modal" data-target="#myModal{{ $nam['id'] }}" class="w3-buttons">Read More</a>
      </div>

      <!--modal-->
      <div class="modal fade" id="myModal{{ $nam['id'] }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
              <div class="main-mailposi">
                <span class="fa fa-pagelines" aria-hidden="true"></span>
              </div>
              <div class="modal_body_left modal_body_left1">
                <h3 class="agileinfo_sign">{{ $nam['title'] }} </h3>
                <p style="text-align: justify;">
                  {!! $nam['body'] !!}
                </p>

                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- //Modal content-->
        </div>
      </div>
      @endforeach
      <div class="clearfix"> </div>
    </div>

    <div class="agileits-services-row-2">
      @foreach($nama3 as $nams)
      <div class="col-md-4 col-xs-6 agileits-services-grids">
        <div class="col-xs-3 wthree-ser">
          <img src="{{ asset('/images/pengetahuan/'.$nams['image'])  }}" style="max-height:70px;max-width:70px;margin-top:5px;">
        </div>
        <div class="col-xs-9 wthree-heading">
          <h4>{{ $nams['title'] }}</h4>
        </div>
        <div class="clearfix"></div>
        <p style="text-align:justify;">{{ substr(strip_tags($nams['body']), 0, 100) }}{{ strlen(strip_tags($nams['body'])) > 100 ? "..." : "" }}</p>
        <a href="#" data-toggle="modal" data-target="#myModal2{{ $nams['id'] }}" class="w3-buttons">Read More</a>
      </div>

      <!--modal-->
      <div class="modal fade" id="myModal2{{ $nams['id'] }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
              <div class="main-mailposi">
                <span class="fa fa-pagelines" aria-hidden="true"></span>
              </div>
              <div class="modal_body_left modal_body_left1">
                <h3 class="agileinfo_sign">{{ $nams['title'] }} </h3>
                <p style="text-align:justify;">
                  {!! $nams['body'] !!}
                </p>

                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- //Modal content-->
        </div>
      </div>
      @endforeach
      <div class="clearfix"> </div>
    </div>

  </div>
</div>
<!-- //services -->
