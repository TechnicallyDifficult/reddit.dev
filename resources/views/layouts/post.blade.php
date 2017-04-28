@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/post.css">
@stop

@section('content')
    <article id="post">
        <div class="row">
            <div class="col-sm-9">
                @yield('post')
            </div>
        </div>
        @hasSection('comments')
            <aside id="comments" class="row">
                <header class="comments-header">
                    <h1>Comments</h1>
                </header>
                @yield('comments')
            </aside>
        @endif
    </article>
@stop