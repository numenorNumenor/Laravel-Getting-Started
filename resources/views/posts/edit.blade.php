@extends('master')

@section('title', '| Edit Post')

@section('stylesheets')
  {{ Html::style('css/select2.min.css') }}
@stop

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Post</h1>

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

          <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('tags', 'Tags :') }}
            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) !!}﻿
          </div>

          <div class="form-group">
            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
          </div>


          <div class="btn-group">
          {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
          </div>

          <div class="btn-group">
            <a class="btn btn-danger" href="{{ route('posts.show', $post->id) }}">Cancel</a>
          </div>

        {!! Form::close() !!}


    </div>
  </div>

@endsection

@section('scripts')
  {{ Html::script('js/select2.full.min.js') }}

  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
  </script>
@stop
