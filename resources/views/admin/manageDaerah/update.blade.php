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
		{!! Form::model($daerah, ['route' => ['dUpdate', $daerah->id], 'files' => true, 'method' => 'POST']) !!}
		<div class="col-md-8">
			{{ Form::label('nama_daerah', 'nama_daerah:') }}
			{{ Form::text('nama_daerah', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('deskripsi', "deskripsi:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('deskripsi', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($daerah->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($daerah->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
            {!! Html::linkRoute('dlihat', 'Cancel', array($daerah->id), array('class' => 'btn btn-danger btn-block')) !!}
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
