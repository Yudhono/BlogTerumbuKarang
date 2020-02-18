@extends('layouts.master')

@section('content')

<!-- testimonials -->
<div class="testimonials">
  <div class="container">
    <div class="title-div">
      <h3 class="tittle">
        <span>W</span>hat people says
      </h3>
      <div class="tittle-style">
      </div>
    </div>
    <div class="col-md-6 testimonials-main">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
              <div class="inner-testimonials-w3ls">
                <img src="{{ asset('frontend/images/tt1.jpg')}}" alt=" " class="img-responsive" />
                <div class="testimonial-info-wthree">
                  <h5>Elizabeth Leah</h5>
                  <span>Sed ut perspiciatis</span>
                  <p class="para-w3-agileits">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="inner-testimonials-w3ls">
                <img src="{{ asset('frontend/images/tt2.jpg')}}" alt=" " class="img-responsive" />
                <div class="testimonial-info-wthree">
                  <h5>Theresa Zoe</h5>
                  <span>Sed ut perspiciatis</span>
                  <p class="para-w3-agileits">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="inner-testimonials-w3ls">
                <img src="{{ asset('frontend/images/tt3.jpg')}}" alt=" " class="img-responsive" />
                <div class="testimonial-info-wthree">
                  <h5>Kevin Matt</h5>
                  <span>Sed ut perspiciatis</span>
                  <p class="para-w3-agileits">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
<!-- //testimonials -->

@endsection
