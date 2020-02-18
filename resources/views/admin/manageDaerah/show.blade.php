@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'View a Content')

@section('main-content')

	<div class="row">
		<div class="col-md-8">
			<h5>Nama Daerah:<h5>
			<p class="lead">{{ $daerah->nama_daerah }}</p>

			<h5>Deskripsi: <h5>
			<p class="lead">{!! $daerah->deskripsi !!}</p>

		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($daerah->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($daerah->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('dhalEdit', 'Edit', array($daerah->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
            {!! Form::open(['route' => ['dDelete', $daerah->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						{{ Html::linkRoute('daerah', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
