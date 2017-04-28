@extends('layouts.master')

@section('pageTitle', 'Add')

@section('content')
    <p>{{ $x }} {{ $o }} {{ abs($y) }} = {{ $x + $y }}</p>
@stop