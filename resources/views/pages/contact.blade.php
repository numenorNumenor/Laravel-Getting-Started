@extends('master')

@section('title', '| Contact')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1>Contact me</h1>

      {!! Form::open([ 'url' => 'pages.contact']) !!}
        <div class="form-group">
          {{ Form::label('email', 'Email :') }}
          {{ Form::text('email', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('message', 'Message :') }}
          {{ Form::textarea('message', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::submit('Send', array('class' => 'btn btn-sm btn-success')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
