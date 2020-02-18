@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'View Content')

@section('main-content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $nama['title'] }}</h1>

      <img src="{{ asset('/images/banner/'.$nama['image'])  }}" style="max-height:800px;max-width:800px;margin-top:5px;">

			<p class="lead">Subtitle 1: {!! $nama['subtitle_1'] !!}</p>
			<p class="lead">Subtitle 2: {!! $nama['subtitle_2'] !!}</p>

		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($nama['created_at'])) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($nama['updated_at'])) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('bhalEdit', 'Edit', array($nama['id']), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
            {!! Form::open(['route' => ['bDelete', $nama['id']], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						{{ Html::linkRoute('banner', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
