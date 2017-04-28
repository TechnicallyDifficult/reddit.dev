@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('content')
    {{ $word }} --&gt; {{ $newWord }}
@stop