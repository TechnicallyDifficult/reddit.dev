@extends('layouts.master')

@section('style')
	<link rel="stylesheet" href="/css/posts.css">
	<link rel="stylesheet" href="/css/posts_create.css">
@stop

@section('content')
	<article id="post">
		<header>
			<h1>@yield('formHeader')</h1>
		</header>

		<form
			method="POST"
			action="{{ $action }}/"
			autocomplete="off">

			{{ method_field($method) }}
			{!! csrf_field() !!}
			
			@if ($errors->has('title'))
				<div class="help-block alert alert-danger">
					{{ $errors->first('title') }}
				</div>
			@endif

			<formgroup class="form-group post-title">
				<label for="post-title">Title</label>
				<input
					type="text"
					name="title"
					id="post-title"
					class="form-control"
					value="{{ old('title') !== NULL ? old('title') : (isset($post) and isset($post->title) ? $post->title : NULL) }}"
					required>
			</formgroup>

			@if ($errors->has('url'))
				<div class="help-block alert alert-danger">
					{{ $errors->first('url') }}
				</div>
			@endif

			<formgroup class="form-group post-url">
				<label for="post-url">Link (Optional)</label>
				<input
					type="url"
					name="url"
					id="post-url"
					class="form-control input-sm"
					value="{{ old('url') !== NULL ? old('url') : (isset($post) and isset($post->url) ? $post->url : NULL) }}">
			</formgroup>

			@if ($errors->has('content'))
				<div class="help-block alert alert-danger">
					{{ $errors->first('content') }}
				</div>
			@endif

			<formgroup class="form-group post-content">
				<label for="post-content" class="sr-only">Content</label>
				<textarea
					name="content"
					id="post-content"
					class="post-body form-control"
					>{{ old('content') !== NULL ? old('content') : (isset($post) and isset($post->content) ? $post->content : NULL) }}</textarea>
			</formgroup>

			@if ($errors->has('tags'))
				<div class="help-block alert alert-danger">
					{{ $errors->first('tags') }}
				</div>
			@endif

			<formgroup class="form-group post-tags">
				<label for="post-tags">Tags (Comma Separated)</label>
				<input
					type="text"
					name="tags"
					id="post-tags"
					class="form-control input-sm"
					value="{{ old('tags') /*!== NULL ? old('tags') : isset(TAGS) ? TAGS : ''*/ }}">
			</formgroup>

			<button type="submit" class="btn btn-success">
				@yield('submitText')
			</button>
			
			<a href="@yield('cancelLink')" class="btn btn-warning">Cancel</a>
		</form>
	</article>
@stop

@section('script')
	@include('partials.scripts.autosize')
@stop