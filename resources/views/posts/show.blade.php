@extends('master')

@section('title', "| $post->title")

@section('content')

  <div class="row">
    <div class="col-md-12">

        <h1>{{ $post->title }}</h1>

        <p class="lead">{{ $post->body }}</p>

        <div class="btn-group">
          <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
        </div>
        
        <div class="btn-group">
          {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

          {!! Form::close() !!}
        </div>

    </div>
  </div>

@stop
