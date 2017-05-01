<!DOCTYPE html>
<html>
<head>
    @include('partials.common_head')
</head>
<body>
    <main class="container-fluid">
        @yield('content')
    </main>

    @hasSection('sidebar')
        <aside id="sidebar">
            @yield('sidebar')
        </aside>
    @endif

    @include('partials.scripts.common')
    @yield('script')
</body>
</html>