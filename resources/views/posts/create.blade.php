@extends('layouts.posts')

@section('pageTitle', 'New Post')

@section('style')
    @parent
    <link rel="stylesheet" href="/css/posts_create.css">
@stop

@section('postTitle')
    Wanna make a new post?
@stop

@section('post')
    <form method="POST" action="{{ action('PostsController@' . $action) }}/">
        {{ method_field($method) }}
        {!! csrf_field() !!}
        <div class="form-group post-title">
            <label for="post-title">Title</label>
            <input type="text" name="title" id="post-title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="form-group post-url">
            <label for="post-url">Link (Optional)</label>
            <input type="url" name="url" id="post-url" class="form-control input-sm" value="{{ old('url') }}">
        </div>
        <div class="form-group post-content">
            <label for="post-content">Content</label>
            <textarea name="content" id="post-content" class="post-content form-control">{{ old('content') }}</textarea>
        </div>
        <div class="form-group post-tags">
            <label for="post-tags">Tags (Comma Separated)</label>
            <input type="text" name="tags" id="post-tags" class="form-control input-sm" value="{{ old('tags') }}">
        </div>
        <button class="btn btn-success" type="submit">Post</button>
    </form>
@stop

@section('script')
    @parent
    @include('partials.scripts.autosize')
@stop