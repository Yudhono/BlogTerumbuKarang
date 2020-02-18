@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Report')

@section('css')

<link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('/css/daterangepicker.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">

@endsection

@section('main-content')
    <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Date picker</h3>
          </div>
          <form>
          <div class="box-body">
            <div class="form-group">

                <div class="col-md-6">
                  <label>Start Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right tanggalAwal" id="datepicker" name="tanggalAwal">
                </div>
              </div>

              <div class="col-md-6">
                <label>End Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right tanggalAkhir" id="datepicker2" name="tanggalAkhir">
                </div>
              </div>

              </div>
          </div>

          <div class="box-footer clearfix">
            <div class="col-md-6">
                <a id="tombolSubmit" class="btn btn-sm btn-info btn-flat pull-left" style="top: 20px; left: 50px;">Submit</a>
            </div>
          </div>
          </form>
        </div>
      </div>

      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">This is chart</h3>
          </div>
          <div class="box-body">
            <div class="col-md-6">
              <div class="panel panel-default chart-view" style="width: 500px; display:none;">
                  <div class="panel-heading"><b>Charts</b></div>
                  <div class="panel-body">
                    <div class="chart-container" >
                      <canvas id="canvas" ></canvas>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<!-- Select2 -->
<script src="{{ asset('/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('/js/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('/js/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('/js/Chart.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<!-- daterangepicker -->
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<!-- script untuk chart -->

<script>
    $( '#tombolSubmit' ).on( 'click', function() {
      $( '.chart-view' ).fadeIn();

      var startDate = $( '.tanggalAwal' ).val();
      var endDate = $( '.tanggalAkhir' ).val();
      var url = '{{url("postingan/chart/:param1/:param2")}}';
      url = url.replace( ':param1', startDate ).replace( ':param2', endDate );
      var tanggal = new Array();
      var label = new Array();
      var jumlah = new Array();

        $.get(url, function(response){
          response.forEach(function(data){
              tanggal.push(data.created_at);
              label.push(data.nama_daerah);
              jumlah.push(data.total);
          });

          var ctx = document.getElementById("canvas").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels:tanggal,
                    datasets: [{
                        label: 'Infosys Price',
                        data: jumlah,
                        borderWidth: 2,
                        borderColor: "#3e95cd",
                        fill: false
                    }]
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    } );

</script>

<!-- script untuk date picker -->
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  })
</script>

@endsection
