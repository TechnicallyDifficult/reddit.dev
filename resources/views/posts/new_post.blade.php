@extends('layouts.post')

@section('pageTitle', 'New Post')

@section('style')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/new_post.css">
@stop

@section('postTitle')
    Wanna make a new post?
@stop

@section('post')
    <form action="{{ action('PostsController@' . $action) }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="url">Link (Optional)</label>
            <input type="url" name="url" id="url" class="form-control input-sm" value="{{ old('url') }}">
        </div>
        <div class="form-group">
            <label for="post-content">Content</label>
            <textarea name="content" id="post-content" class="post-body form-control" value="{{ old('content') }}"></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags (Comma Separated)</label>
            <input type="text" name="tags" id="tags" class="form-control input-sm" value="{{ old('tags') }}">
        </div>
    </form>
@stop

@section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.20/autosize.min.js"></script>
    <script>
        $(document).ready(function() {
            autosize($('textarea'));
        });
    </script>
@stop