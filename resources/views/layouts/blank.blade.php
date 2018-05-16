<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>@yield('title') - {{ config('app.name') }}</title>
        <link rel="stylesheet" type="text/css" href="css/app.css">
    </head>
    <body>
        @yield('content')
    </body>
</html>
