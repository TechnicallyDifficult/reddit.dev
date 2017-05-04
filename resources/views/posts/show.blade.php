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

		<div class="post-body">
			{{ $post->content }}
			<div>
				@if (Auth::user() === $post->created_by or Auth::user() === 'ADMIN')
					<a href="{{ action('PostsController@edit', ['id' => $post->id]) }}" class="btn btn-info post-edit-button">
						Edit
					</a>
					<a href="{{ action('PostsController@delete', ['id' => $post->id]) }}" class="btn btn-danger post-delete-button">
						Delete
					</a>
				@endif
			</div>
		</div>

		<aside id="comments">
			<header>
				<h1>{{-- {{ NUMBER_OF_COMMENTS }} --}} Comments</h1>
			</header>
			<div>
				@yield('comments')
			</div>
		</aside>

	</article>
@stop