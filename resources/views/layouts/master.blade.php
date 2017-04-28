<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    @yield('style')

    <title>@yield('pageTitle') ~ reddit.dev</title>
</head>
<body>
    <main class="container">
        @yield('content')
    </main>
    @include('partials.common_script')
    @yield('script')
</body>
</html>