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

            <formgroup class="form-group post-title">
                <label for="post-title">Title</label>
                <input
                    type="text"
                    name="title"
                    id="post-title"
                    class="form-control"
                    value="{{ old('title') !== NULL ? old('title') : isset($post->title) ? $post->title : NULL }}"
                    required>
            </formgroup>

            <formgroup class="form-group post-url">
                <label for="post-url">Link (Optional)</label>
                <input
                    type="url"
                    name="url"
                    id="post-url"
                    class="form-control input-sm"
                    value="{{ old('url') !== NULL ? old('url') : isset($post->url) ? $post->url : NULL }}">
            </formgroup>

            <formgroup class="form-group post-content">
                <label for="post-content" class="sr-only">Content</label>
                <textarea
                    name="content"
                    id="post-content"
                    class="post-body form-control"
                    >{{ old('content') !== NULL ? old('content') : isset($post->content) ? $post->content : '' }}</textarea>
            </formgroup>

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

        </form>
    </article>
@stop

@section('script')
    @include('partials.scripts.autosize')
@stop