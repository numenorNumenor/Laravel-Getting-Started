@extends('master')

@section('title', "| $tag->name")

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>Edit Tag</h3>

      {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}

        <div class="form-group">
          {{ Form::label('name', 'Tag :') }}
          {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

      {!! Form::close() !!}
      </div>
    </div>
  </div>

@stop
