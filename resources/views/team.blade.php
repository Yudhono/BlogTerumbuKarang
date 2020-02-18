@extends('layouts.master')

@section

<!-- team -->
<div class="team" id="team">
  <div class="container">
    <div class="title-div">
      <h3 class="tittle">
        <span>M</span>eet Our Team
      </h3>
      <div class="tittle-style">
      </div>
    </div>
    <div class="agileits-team-grids">
      <div class="col-sm-3 col-xs-6 agileits-team-grid">
        <div class="team-info">
          <img src="{{ asset('frontend/images/t1.jpg')}}" alt="">
          <div class="team-caption">
            <h4>Mark Duncan</h4>
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-rss"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-6 agileits-team-grid">
        <div class="team-info">
          <img src="{{ asset('frontend/images/t2.jpg')}}" alt="">
          <div class="team-caption">
            <h4>Cynthia Baker</h4>
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-rss"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-6 agileits-team-grid">
        <div class="team-info">
          <img src="{{ asset('frontend/images/t3.jpg')}}" alt="">
          <div class="team-caption">
            <h4>Peter Wright</h4>
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-rss"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-6 agileits-team-grid">
        <div class="team-info">
          <img src="{{ asset('frontend/images/t4.jpg')}}" alt="">
          <div class="team-caption">
            <h4>Steven Wilson</h4>
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-rss"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!-- //team -->

@endsection
