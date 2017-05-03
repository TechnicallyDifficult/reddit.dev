@extends('posts.post_form')

@section('pageTitle', 'Edit Post - ' . $post->title)

@section('formHeader', 'Looking to edit a post?')

@section('submitText', 'Update')

@section('cancelLink', action('PostsController@show', ['id' => $post->id]))