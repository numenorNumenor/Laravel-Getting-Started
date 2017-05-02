@extends('master')

@section('title', '| All Posts')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1>All Posts</h1>
      <div class="form-group">
        <a class="btn btn-lg btn-success" href="{{ route('posts.create') }}">Create new</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title :</th>
            <th>Post :</th>
            <th>Created at :</th>
            <th>Action :</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
              <td>{{ $post->created_at->diffForHumans() }}</td>
              <td>
                <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <a class="btn btn-default btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>

@stop
