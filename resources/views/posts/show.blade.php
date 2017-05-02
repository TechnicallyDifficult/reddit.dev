@extends('layouts.master')

@section('pageTitle')
	{{ $post->title }} - Posts
@stop

@section('style')
	<link rel="stylesheet" href="/css/posts.css">
@stop

@section('content')
	<article id="post">
		<header>
			<a href="{{ $post->url ? $post->url : '' }}">
				<h1>{{ $post->title }}</h1>
			</a>
		</header>

		<footer>
			Submitted
			<time class="multivalue" datetime="{{ $post->created_at->toIso8601String() }}">
				<span class="date-created value hidden">
					{{ $post->created_at->format('m/d/Y H:i a') }}
				</span>
				<span class="date-created-relative value">
					{{ $post->getTimeAgo('created_at') }}
				</span>
			</time>
			* by
			<a href="{{-- {{ POST_AUTHOR_PAGE }} --}}" id="post-author">
				{{ $post->user_id /* TODO: Change this to actual username */}}
			</a>
		</footer>

		<submain class="post-body">
			{{ $post->content }}
			<div>
				@if (false/* USER_IS_POST_AUTHOR_OR_ADMIN */)
					<a href="{{ action('PostController@edit') }}" class="btn btn-info">Edit</a>
					<a href="{{ action('PostController@delete') }}" class="btn btn-danger">Delete</a>
				@endif
			</div>
		</submain>

		<aside id="comments">
			<header>
				<h1>{{-- {{ NUMBER_OF_COMMENTS }} --}} Comments</h1>
			</header>
			<submain>
				@yield('comments')
			</submain>
		</aside>

	</article>
@stop