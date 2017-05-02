@extends('master')

@section('style')
	<link rel="stylesheet" href="/css/posts.css">
@stop

@section('pageTitle', 'All Posts')

@section('content')
	<article id="posts-index" class="index">
		<header>
			<h1>All Posts</h1>
		</header>
		<submain>
			<ol>
				@foreach ($stickies as $post)
					@include('posts.index_entry')
				@endforeach
			</ol>
			<ol>
				@foreach ($posts as $post)
					@include('posts.index_entry')
				@endforeach
			</ol>
		</submain>
		@include('partials.pagelinks_nav')
	</article>
@stop