@extends('layouts.post')

@section('pageTitle', 'New Post')

@section('style')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/new_post.css">
@stop

@section('post')
    <header class="post-title">
        <h1>Wanna make a new post?</h1>
    </header>
    <form action="" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="url" name="url" id="url" class="form-control input-sm" placeholder="Link (Optional)">
        </div>
        <div class="form-group">
            <label for="post-body">Content</label>
            <textarea name="content" id="post-body" class="post-body form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control input-sm" placeholder="Tags (Comma Separated)">
        </div>
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