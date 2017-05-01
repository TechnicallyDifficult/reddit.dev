@extends('layouts.post')

@section('pageTitle')
    {{ $post->title }} - Posts
@stop

@section('postTitle')
    @if (isset($post->url))
        <a href="{{ $post->url }}">{{ $post->title }}</a>
    @else
        {{ $post->title }}
    @endif
@stop

@section('post')
    <footer>
        Submitted 
        <time class="multidate" datetime="{{ $post->created_at->toIso8601String() }}">
            <span class="date-created hidden">
                {{ $post->created_at->format('m/d/Y H:i a') }}
            </span>
            <span class="date-created-relative">
                {{ $post->getTimeAgo('created_at') }}
            </span>
        </time>
         * by 
        <a href="{{-- {{ POST_AUTHOR_PAGE }} --}}" id="post-author">
            {{ $post->user_id /* TODO: Change this to actual username */}}
        </a>
    </footer>
    <div class="post-body">
        {{ $post->content }}
        @if (false/* USER_IS_POST_AUTHOR_OR_ADMIN */)
            <a href="{{ action('PostController@edit') }}" class="btn btn-info">Edit</a>
            <a href="{{ action('PostController@delete') }}" class="btn btn-danger">Delete</a>
        @endif
    </div>
@stop

@section('comments')
@stop