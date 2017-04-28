@extends('layouts.post')

@section('pageTitle', 'New Post')

@section('style')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/new_post.css">
@stop

@section('post')
    <h4 class="post-title">Wanna make a new post?</h4>
    <form action="" method="POST">
        {!! csrf_field() !!}
        <input type="text" name="title" class="form-control" required>
        <input type="url" name="url" class="form-control">
        <section class="post-body">
            <textarea name="content" class="form-control"></textarea>
        </section>
        <input type="text" name="tags" class="form-control">
    </form>
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.20/autosize.min.js"></script>
    <script>
        $(document).ready(function() {
            autosize($('textarea'));
        });
    </script>
@append