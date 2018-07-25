@extends('layouts.app')

@section('content')

	<div class="row">
		{!! Form::model($service,['route' => ['services.update', $service->id],'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('name','Name:')}}
                    {{ Form::text('name',null,array('class' => 'form-control','required' => '', 'maxlenght' => '50'))}}                    

                    {{ Form::label('phone','Phone:',['style'=>'margin-top: 20px;'])}}
                    {{ Form::text('phone',null,array('class' => 'form-control','required' => '', 'maxlenght' => '10'))}}

                    {{ Form::label('razsocial','Raz Social:')}}
                    {{ Form::text('razsocial',null,array('class' => 'form-control','required' => '', 'maxlenght' => '50'))}}

                    {{ Form::label('seller','Seller:')}}
                    {{ Form::text('seller',null,array('class' => 'form-control','required' => '', 'maxlenght' => '50'))}}     

                    {{ Form::label('sellerphone','Seller Phone:')}}
                    {{ Form::text('sellerphone',null,array('class' => 'form-control','required' => '', 'maxlenght' => '10'))}}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date("j M, Y",strtotime($service->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('j M, Y',strtotime($service->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('services.show', 'Cancel', array($service->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@stop