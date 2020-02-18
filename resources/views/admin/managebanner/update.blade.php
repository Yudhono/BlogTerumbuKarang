@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Update a Content')

@section('css')

	{!! Html::style('css/parsley.css') !!}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('main-content')

<div class="row">
		{!! Form::model($banner, ['route' => ['bUpdate', $banner->id], 'files' => true, 'method' => 'POST']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('subtitle_1', 'Subtitle 1:') }}
			{{ Form::text('subtitle_1', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('subtitle_2', 'Subtitle 2:') }}
			{{ Form::text('subtitle_2', null, ["class" => 'form-control input-lg']) }}

      {{ Form::label('image', 'Upload a Featured Image') }}
      {{ Form::file('image', null, ["class" => 'form-control input-lg']) }}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($banner->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($banner->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
            {!! Html::linkRoute('blihat', 'Cancel', array($banner->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('js')

	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
