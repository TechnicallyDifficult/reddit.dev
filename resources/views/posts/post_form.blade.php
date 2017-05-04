@extends('layouts.master')

@section('style')
	<link rel="stylesheet" href="/css/posts.css">
	<link rel="stylesheet" href="/css/posts_form.css">
@stop

@section('content')
	<article id="post">
		<header>
			<h1>@yield('formHeader')</h1>
		</header>

		<form
			method="POST"
			action="@yield('action')/"
			autocomplete="off">
			
			@yield('methodField')

			{!! csrf_field() !!}

			<fieldset>
				<legend class="sr-only">Post Info</legend>

				<div class="form-group post-title">
					@if ($errors->has('title'))
						<label for="post-title" class="form-error alert alert-danger">
							{{ $errors->first('title') }}
						</label>
					@endif

					<label for="post-title">Title</label>
					<input
						type="text"
						name="title"
						id="post-title"
						class="form-control"
						value="{{ old('title') !== NULL ? old('title') : (isset($post) and isset($post->title) ? $post->title : NULL) }}"
						required
						autofocus>
				</div>

				<div class="form-group post-url">
					@if ($errors->has('url'))
						<label for="post-url" class="form-error alert alert-danger">
							{{ $errors->first('url') }}
						</label>
					@endif

					<label for="post-url">Link (Optional)</label>
					<input
						type="url"
						name="url"
						id="post-url"
						class="form-control input-sm"
						value="{{ old('url') !== NULL ? old('url') : (isset($post) and isset($post->url) ? $post->url : NULL) }}">
				</div>

				<div class="form-group post-content">
					@if ($errors->has('content'))
						<label for="post-content" class="form-error alert alert-danger">
							{{ $errors->first('content') }}
						</label>
					@endif

					<label for="post-content" class="sr-only">Content</label>
					<textarea
						name="content"
						id="post-content"
						class="post-body form-control"
						>{{ old('content') !== NULL ? old('content') : (isset($post) and isset($post->content) ? $post->content : NULL) }}</textarea>
				</div>
			</fieldset>

			<div class="form-group post-tags">
				@if ($errors->has('tags'))
					<label for="post-tags" class="form-error alert alert-danger">
						{{ $errors->first('tags') }}
					</label>
				@endif

				<label for="post-tags">Tags (Comma Separated)</label>
				<input
					type="text"
					name="tags"
					id="post-tags"
					class="form-control input-sm"
					value="{{ old('tags') /*!== NULL ? old('tags') : isset(TAGS) ? TAGS : ''*/ }}">
			</div>
			
			<div class="form-group">
				<label for="alias">Post as...</label>
				<select name="alias" id="alias" class="form-control">
					@if (true/* USER_HAS_SUBREDDIT_ALIAS */)
						<option value="subreddit">{{ 'Subreddit Alias' }}</option>
					@endif
					<option value="global">{{ true/*isset(USER_GLOBAL_ALIAS)*/ ? 'Global Alias' : 'Login Name' }}</option>
					<option value="anonymous">Anonymous</option>
				</select>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-success">
					@yield('submitText')
				</button>
				
				<a href="@yield('cancelLink')" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</article>
@stop

@section('script')
	@include('partials.scripts.autosize')
@stop