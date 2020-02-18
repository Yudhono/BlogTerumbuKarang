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
		{!! Form::model($project, ['route' => ['prUpdate', $project->id], 'files' => true, 'method' => 'POST']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('tahun', 'Tahun:') }}
			{{ Form::text('tahun', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('karang_hidup', 'Karang Hidup:') }}
			{{ Form::text('karang_hidup', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('karang_mati', 'Karang Mati:') }}
			{{ Form::text('karang_mati', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('pasir', 'Pasir:') }}
			{{ Form::text('pasir', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('daerah_id', 'nama daerah:') }}
				<select id="daerah_id" class="form-control" name="daerah_id" value="{{$project->daerah_id}}">
					<option  disabled selected>{{ $nama }}</option>
					@foreach($daerahs as $aidi)
              <option value="{{ $aidi->id }}">{{ $aidi->nama_daerah }}</option>
          @endforeach

				</select>

			{{ Form::label('created_by', 'Created By:') }}
			{{ Form::text('created_by', null, ["class" => 'form-control input-lg']) }}

      {{ Form::label('image', 'Upload a Featured Image') }}
      {{ Form::file('image', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($project->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($project->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
            {!! Html::linkRoute('prlihat', 'Cancel', array($project->id), array('class' => 'btn btn-danger btn-block')) !!}
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
