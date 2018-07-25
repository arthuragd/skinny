@extends('layouts.app')

@section('content')

    <div class="row">
        <div class ="col-md-4 col-md-offset-2">
            <h1>Create New Service</h1>
            <hr>
                {!! Form::open(['route' => 'services.store','method' => 'post']) !!}
                    {{ csrf_field() }}
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

                    {{ Form::submit('Create Service',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top: 20px;'))}}
                    {!! Form::close() !!}

        </div>
    </div>

    
@endsection
