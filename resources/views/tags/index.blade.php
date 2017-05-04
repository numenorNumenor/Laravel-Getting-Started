@extends('master')

@section('title', '| All tags')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h3>All tags</h3>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tags :</th>
          <th>Created at:</th>
          <th>Action :</th>
        </tr>
      </thead>

      <tbody>
        @foreach ( $tags as $tag)
          <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->created_at->diffForHumans() }}</td>
            <td>
              <a class="btn btn-sm btn-default" href="{{ route('tags.show', $tag->id) }}">View</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    </div>

    <div class="col-md-3 col-md-offset-1">
      <h3>Create Tag</h3>

      {!! Form::open(['route' => 'tags.store']) !!}

        <div class="form-group">
          {{ Form::label('name', 'Tag :') }}
          {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

      {!! Form::close() !!}
    </div>
  </div>

@stop
