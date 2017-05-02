<!DOCTYPE html>
<html>
<head>
    @include('partials.common_head')
</head>
<body>
    <page class="container-fluid">
        <main class="col-sm-8 col-md-9">
            @yield('content')
        </main>

        @hasSection('sidebar')
            <aside id="sidebar">
                @yield('sidebar')
            </aside>
        @endif
    </page>

    @include('partials.scripts.common')
    @yield('script')
</body>
</html>