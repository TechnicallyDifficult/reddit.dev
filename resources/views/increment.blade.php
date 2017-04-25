@extends('layouts.master')

@section('content')
	<a href="{{ action('Main@increment', [$number - 1]) }}">-</a>
	{{ $number }}
	<a href="{{ action('Main@increment', [$number + 1]) }}">+</a>
@stop