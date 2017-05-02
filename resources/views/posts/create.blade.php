@extends('master')

@section('title', '| Create')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1>Create Post</h1>

      {!! Form::open([ 'route' => 'posts.store']) !!}
        <div class="form-group">
          {{ Form::label('title', 'Title :') }}
          {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('body', 'Post :') }}
          {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::submit('Create', array('class' => 'btn btn-sm btn-success')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
