@extends('layouts.common')

@section('content')
    <p>{{ $roll }}</p>
    @if (isset($guess))
        <p>{{ $guess }}</p>
        <p>
            @if ($guess == $roll)
                Looks like a match.
            @else
                Nope. Wrong. Luck is depressing, isn't it?
            @endif
        </p>
    @endif
@stop