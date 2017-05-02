{{-- temporary code for testing purposes --}}
@php
    $pages = 1;
@endphp
{{-- end --}}

<nav class="page-nav">
    <header>
        <h1>Jump to page...</h1>
    </header>
    <div class="section-body">
        @if ($pages === 1)
            <a id="only-page-text">Yep, that's all.</a>
        @else
            @if ($page !== 1 and $pages > 2)
                <a class="prev-page" href="{{-- SAME_URL --}}/{{ $page - 1 }}"><- Prev</a>
            @endif

            @if ($pages <= 10)
                @for ($i = 1; $i <= $pages; $i++)
                    <a href="{{-- SAME_URL --}}/{{ $i }}" class="page-jump">
                        @if ($i === 1)
                            First
                        @elseif ($i === $pages)
                            Last
                        @else
                            {{ $i }}
                        @endif
                    </a>
                @endfor
            @endif

            @if ($page !== $pages and $pages > 2)
                <a class="next-page" href="{{-- SAME_URL --}}/{{ $page + 1 }}">Next -></a>
            @endif
        @endif
    </div>
</nav>