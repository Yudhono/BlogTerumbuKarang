@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Content Project')

@section('css')

<link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables_themeroller.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('main-content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">All Data</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <table id="example" class="table table-bordered table-hover dataTable">
      <thead>
          <tr>
              <th>id</th>
              <th>title</th>
              <th>tahun</th>
              <th>karang hidup</th>
              <th>karang mati</th>
              <th>pasir</th>
              <th>total</th>
              <th>tutupan (dalam %)</th>
              <th>keputusan</th>
              <th>nama daerah</th>
              <th>content</th>
              <th>image</th>
              <th>created by</th>
              <th>updated at</th>
              <th>action</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>id</th>
            <th>title</th>
            <th>tahun</th>
            <th>karang hidup</th>
            <th>karang mati</th>
            <th>pasir</th>
            <th>total</th>
            <th>tutupan (dalam %)</th>
            <th>keputusan</th>
            <th>nama daerah</th>
            <th>content</th>
            <th>image</th>
            <th>created by</th>
            <th>updated at</th>
            <th>action</th>
          </tr>
      </tfoot>
      <tbody>
        @foreach($nama as $nam)
          <tr>
              <td>{{ $nam['id'] }}</td>
              <td>{{ $nam['title'] }}</td>
              <td>{{ $nam['tahun'] }}</td>
              <th>{{ $nam['karang_hidup'] }}</th>
              <th>{{ $nam['karang_mati'] }}</th>
              <td>{{ $nam['pasir'] }}</td>
              <td>{{ $nam['total'] }}</td>
              <th>{{ $nam['tutupan'] }}</th>
              <td>{{ substr(strip_tags($nam['keputusan']), 0, 50) }}{{ strlen(strip_tags($nam['keputusan'])) > 50 ? "..." : "" }}</td>
              <th>{{ $nam['nama_daerah'] }}</th>
              <td>{{ substr(strip_tags($nam['body']), 0, 50) }}{{ strlen(strip_tags($nam['body'])) > 50 ? "..." : "" }}</td>
              <td><img src="{{ asset('/images/project/'.$nam['image'])  }}" style="max-height:100px;max-width:100px;margin-top:5px;"></td>
              <th>{{ $nam['created_by'] }}</th>
              <td>{{ $nam['updated_at'] }}</td>
              <td>
                {!! Form::open(['route' => ['prDelete', $nam['id']], 'method' => 'DELETE']) !!}
                <a href="{{ route('prlihat', $nam['id']) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('prhalEdit', $nam['id']) }}" class="btn btn-success btn-sm">Edit</a>
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>

<script>
$(document).ready( function () {
    $('#example').DataTable({
      paging: true,
      scrollX: true
    });
} );
</script>

@endsection
