@extends('layouts.app')

@section('content')

    <div class="row">
        <div class ="col-md-4 col-md-offset-2">
            <h1>Create New Bill</h1>
            <hr>
                {!! Form::open(['route' => 'bills.store','data-parsley-validate' => '', 'files' => true]) !!}
                    {{ Form::label('date','Date:')}}
                    {{ Form::date('date',null,array('class' => 'form-control','required' => ''))}}

                    {{ Form::label('value','Value:',['style'=>'margin-top: 20px;'])}}
                    {{ Form::number('value',null,['class' => 'form-control','required' => ''])}}
                    

                    {{ Form::label('services_id','Services:')}}
                    <select class="form-control" name="services_id"> 
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('featured_image', 'Upload Image:') }}
                    {{ Form::file('featured_image') }}                  


                    {{ Form::submit('Create Bill',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top: 20px;'))}}
                    {!! Form::close() !!}
        </div>
    </div>

    
@endsection
