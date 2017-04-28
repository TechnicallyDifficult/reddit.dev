@extends('layouts.post')

@section('pageTitle')
	{{-- {{ POST_TITLE }} --}} - Posts
@stop

@section('postTitle')
	<a href="{{-- {{ POST_URL_IF_EXISTS }} --}}">{{-- {{ POST_TITLE }} --}}</a>
@stop

@section('post')
	<footer>
		Submitted <a class="time"><time datetime="{{-- {{ TIMESTAMP }} --}}" data-datetime="{{-- {{ DATE_POSTED_HUMAN_READABLE }} --}}" data-datetime-relative="{{-- {{ MATH }} --}}">{{-- {{ MATH }} --}}</time></a> ago * by <a href="{{-- {{ POST_AUTHOR_PAGE }} --}}" id="post-author">{{-- {{ POST_AUTHOR }} --}}</a>
	</footer>
	<div class="post-body">
		{{-- {{ POST_CONTENT }} --}}
		@if (true/* USER_IS_POST_AUTHOR_OR_ADMIN */)
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