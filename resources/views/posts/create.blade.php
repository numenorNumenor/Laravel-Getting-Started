@extends('master')

@section('title', '| Create New Post')

@section('stylesheets')
  {{ Html::style('css/select2.min.css') }}
@stop

@section('content')

  <div class="row">
    <div class="col-md-12">

        <h1>Create New Post</h1>

        {!! Form::open(['route' => 'posts.store']) !!}

          <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('tags', 'Tags :') }}
            {!! Form::select('tags', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple', 'name' => 'tags[]']) !!}﻿
          </div>

          <div class="form-group">
            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
          </div>

          {{ Form::submit('Create Post', array('class' => 'btn btn-success')) }}

        {!! Form::close() !!}

    </div>
  </div>

@endsection

@section('scripts')
  {{ Html::script('/js/select2.full.min.js') }}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@stop
