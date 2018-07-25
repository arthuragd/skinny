@extends('layouts.app')

@section('content')

    <div class="row">
        {!! Form::model($bill,['route' => ['bills.update', $bill->id],'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('date','Date:')}}
                    {{ Form::date('date',null,array('class' => 'form-control','required' => ''))}}                    

                    {{ Form::label('value','Value:',['style'=>'margin-top: 20px;'])}}
                    {{ Form::number('value',null,array('class' => 'form-control','required' => ''))}}  

                    {{ Form::label('services_id','Services:')}}
                    <select class="form-control" name="services_id"> 
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>   
            {{ Form::label('featured_image','Update Image:') }}
            {{ Form::file('featured_image') }}  
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date("j M, Y",strtotime($bill->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j M, Y',strtotime($bill->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('bills.show', 'Cancel', array($bill->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop