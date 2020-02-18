<div class="container">
  <div class="title-div">
    <h3 class="tittle">
      <span>O</span>ur Projects
    </h3>
    <div class="tittle-style">
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12" style="text-align: center;">
      <img src="{{ asset('/images/OurProject/'.$nama6['image'])  }}" style="max-height:800px;max-width:800px; display: inline-block;">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12" style="text-align: center;">
      <p style="display: inline-block;">{{ substr(strip_tags($nama6['projectDescription']), 0) }}</p>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-12" style="text-align: center;">
      <a href="{{ url('projects_new/') }}" target="_blank" class="w3-buttons">Take a look to our project</a>
    </div>
  </div>
</div>
