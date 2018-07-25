@extends('layouts.app')

@section('content')
	
	 <div class="row">
    	<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Name:</label>
					<p>{{ $service->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>User:</label>
					<p>{{ $service->user['name'] }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Phone:</label>
					<p>{{ $service->phone }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Raz Social:</label>
					<p>{{ $service->razsocial }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('services.edit', 'Edit', array($service->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['services.destroy', $service->id],'method' => 'DELETE']) !!}
						{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('services.index', 'See all Services', [], array('class' => 'btn btn-default btn-block btn-h1-spacing', 'style' => 'margin-top: 20px;')) !!}
					</div>
				</div>

			</div>
		</div>
  </div>

@endsection