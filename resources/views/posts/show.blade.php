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
			@include('posts.above_info')
		</footer>

		<submain class="post-body">
			{{ $post->content }}
			<div>
				@if (false/* USER_IS_POST_AUTHOR_OR_ADMIN */)
					<a href="{{ action('PostsController@edit', ['id' => $post->id]) }}" class="btn btn-info">
						Edit
					</a>
					<a href="{{ action('PostsController@delete', ['id' => $post->id]) }}" class="btn btn-danger">
						Delete
					</a>
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