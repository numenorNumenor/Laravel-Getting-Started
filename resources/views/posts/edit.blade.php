@extends('master')

@section('title', '| Edit')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1>Edit Post</h1>

      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="form-group">
          {{ Form::label('title', 'Title :') }}
          {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('body', 'Post :') }}
          {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::submit('Edit', array('class' => 'btn btn-sm btn-success')) }}
          <a class="btn btn-default btn-sm" href="{{ route('posts.show', $post->id) }}">Cancel</a>
        </div>
      {!! Form::close() !!}

    </div>
  </div>

@stop
