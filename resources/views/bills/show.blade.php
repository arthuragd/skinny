@extends('layouts.app')

@section('content')
	
	 <div class="row">
    	<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Service:</label>
					<p>{{ $bill->service->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Date:</label>
					<p>{{ $bill->date }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Value:</label>
					<p>{{ $bill->value }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Image:</label>
					<p><img src="{{ asset('images/' . $bill->image) }}" height="250" width="400"/></p>
				</dl>

				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('bills.edit', 'Edit', array($bill->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['bills.destroy', $bill->id],'method' => 'DELETE']) !!}
						{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('bills.index', 'See all Bills', [], array('class' => 'btn btn-default btn-block btn-h1-spacing', 'style' => 'margin-top: 20px;')) !!}
					</div>
				</div>

			</div>
		</div>
  </div>

@endsection