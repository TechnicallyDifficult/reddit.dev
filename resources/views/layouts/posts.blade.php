@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/posts.css">
@stop

@section('content')
    <article id="post" class="col-sm-8 col-md-9">
        <header>
            <h1>@yield('postTitle')</h1>
        </header>
        <div class="section-body">
            @yield('post')
        </div>
        @hasSection('comments')
            <aside id="comments">
                <header>
                    <h1>{{-- {{ NUMBER_OF_COMMENTS }} --}} Comments</h1>
                </header>
                <div class="section-body">
                    @yield('comments')
                </div>
            </aside>
        @endif
    </article>
@stop