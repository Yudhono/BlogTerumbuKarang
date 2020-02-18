@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Content Welcome')

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
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Content</h1>
			<hr>
			{!! Form::open(array('route' => 'cInput', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('image', 'Upload a Featured Image') }}
				{{ Form::file('image') }}

				{{ Form::label('body', "Post Body:") }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}

				{{ Form::submit('Create New', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('js')

	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
