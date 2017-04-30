@extends('layouts.post')

@section('pageTitle')
    {{ $post->title }} - Posts
@stop

@section('postTitle')
    @if (isset($post->url))
        <a href="$post->url">$post->title</a>
    @else
        $post->title
    @endif
@stop

@section('post')
    <footer>
        Submitted 
        <a class="time">
            <time datetime="{{ $post->date_created->format('c') }}">
                <span class="date-created hidden">
                    {{ $post->date_created->format('') }}
                </span>
                <span class="date-created-relative">
                    {{ preg_replace('~\b1\b~', 'a', $post->date_created->diffForHumans()) }} ago
                </span>
            </time>
        </a>
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

@section('script')
    @parent
    <script type="text/javascript" src="/js/time_click.js"></script>
@stop