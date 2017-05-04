@extends('master')

@section('title', "| $tag->name")

@section('content')

  <div class="row">

    <div class="col-md-8 col-md-offset-2">

      <p><small>This tag was created : <strong>{{ $tag->created_at->diffForHumans() }}</strong></small></p>

      <h1>{{ $tag->name }} tag <small>has {{ $tag->posts()->count() }} posts.</small></h1>

      <p><small>Updated : <strong>{{ $tag->updated_at->diffForHumans() }}</strong></small></p>

      <div class="btn-group">

        <a  class="btn btn-sm btn-primary" href="{{ route('tags.index') }}">back to tags</a>

        <a class="btn btn-sm btn-success" href="{{ route('tags.edit', $tag->id) }}">Edit</a>

        {{ Form::open([ 'route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}

          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

        {{ Form::close() }}

      </div>

    </div>

  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title :</th>
            <th>Tags :</th>
            <th>Action :</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($tag->posts as $post)
            <tr>
              <td>{{ $post->id }}</td>

              <td>{{ $post->title }}</td>

              <td>
                @foreach ($post->tags as $tag)
                  <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
              </td>

              <td>
                <a class="btn btn-default btn-xs" href="{{ route('tags.show', $tag->id) }}">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@stop
