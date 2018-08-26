<!DOCTYPE HTML>
<html>
    <head>
        <title>Full Stack Developer and DevOps Engineer Nottingham - mikeylicio.us</title>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        
        @stack('styles-before')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @stack('styles-after')

    </head>
    <body class="is-preload">
        <!-- Banner -->
        @if(View::hasSection('hero'))
        <section id="banner">
            @yield('hero')
        </section>
        @endif

        <!-- Main -->
        <section id="main" class="wrapper">
            @yield('content')
        </section>

        <!-- CTA -->
        @include('layouts.cta')
        
        <!-- Footer -->
        @include('layouts.footer')

        <!-- Scripts -->
        @stack('scripts-before')
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts-after')
    </body>
</html>
