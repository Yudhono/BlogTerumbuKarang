@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'View a Content')

@section('main-content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $nama['title'] }}</h1>

      <img src="{{ asset('/images/project/'.$nama['image'])  }}" style="max-height:800px;max-width:700px;margin-top:5px;">
			<br>


			<p class="lead">{!! $nama['body'] !!}</p>

			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Keputusan</h3>

					<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
				</div>

				<div class="box-body">
					<p>{!! $nama['keputusan'] !!}</p>
				</div>
			</div>

			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Comments <small>{{ $project->comments()->count() }} total</small></h3>

					<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
				</div>

				<div class="box-body">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Comment</th>
								<th width="70px"></th>
							</tr>
						</thead>

						<tbody>
							@foreach ($project->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($nama['created_at'])) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created By:</label>
					<p>{{ $nama['created_by'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Tahun:</label>
					<p>{{ $nama['tahun'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Karang Hidup:</label>
					<p>{{ $nama['karang_hidup'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Karang Mati:</label>
					<p>{{ $nama['karang_mati'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Pasir:</label>
					<p>{{ $nama['pasir'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Total terumbu karang dan pasir:</label>
					<p>{{ $nama['total'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Tutupan terumbu karang:</label>
					<p>{{ $nama['tutupan'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($nama['updated_at'])) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('prhalEdit', 'Edit', array($nama['id']), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
            {!! Form::open(['route' => ['prDelete', $nama['id']], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						{{ Html::linkRoute('project', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
