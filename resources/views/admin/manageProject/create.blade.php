@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Content Project')

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
			{!! Form::open(array('route' => 'prInput', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('tahun', 'Tahun:') }}
				{{ Form::text('tahun', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('karang_hidup', 'Karang Hidup:') }}
				{{ Form::text('karang_hidup', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('karang_mati', 'Karang Mati:') }}
				{{ Form::text('karang_mati', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('pasir', 'pasir:') }}
				{{ Form::text('pasir', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('daerah_id', 'nama daerah:') }}
				<select class="form-control" name="daerah_id">
					@foreach($ids as $aidi)
              <option value="{{ $aidi->id }}">{{ $aidi->nama_daerah }}</option>
          @endforeach

				</select>

				{{ Form::label('created_by', 'Created By:') }}
				{{ Form::text('created_by', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

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
	{!! Html::script('js/select2.min.js') !!}

@endsection
