@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/post.css"></link>
@stop

@section('content')
    <article class="post">
        @yield('post')
    </article>
    @hasSection('comments')
        <article class="comments form-group">
            @yield('comments')
        </article>
    @endif
@stop