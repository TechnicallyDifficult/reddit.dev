@extends('posts.post_form')

@section('pageTitle', 'New Post')

@section('formHeader', 'Wanna make a new post?')

@section('action', action('PostsController@store'))

@section('submitText', 'Post!')

@section('cancelLink', action('PostsController@index'))