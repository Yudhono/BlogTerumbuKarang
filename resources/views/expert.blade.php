@extends('layouts.master')

@section('content')

<!-- experts section -->
<div class="what-w3ls">
  <div class="container">
    <div class="title-div">
      <h3 class="tittle">
        <span>W</span>e are expert in
      </h3>
      <div class="tittle-style">
      </div>
    </div>
    <div class="what-grids">
      <div class="col-md-6 what-grid">
        <img src="{{ asset('frontend/images/work.png')}}" class="img-responsive" alt="" />
      </div>
      <div class="col-md-6 what-grid1">
        <div class="what-top">
          <div class="what-left">
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
          <div class="what-right">
            <h4>Sed ut perspiciatis</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
              consectetur adipisicing elit.</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="what-top1">
          <div class="what-left">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          </div>
          <div class="what-right">
            <h4>psum quia dolor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
              consectetur adipisicing elit.</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="what-top1">
          <div class="what-left">
            <i class="fa fa-leaf" aria-hidden="true"></i>
          </div>
          <div class="what-right">
            <h4>psum quia dolor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
              consectetur adipisicing elit.</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- //experts section -->

@endsection
