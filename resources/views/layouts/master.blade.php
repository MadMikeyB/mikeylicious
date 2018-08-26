<!DOCTYPE HTML>
<html>
    <head>
        @if(View::hasSection('title'))
        <title>@yield('title') &mdash; Full Stack Developer and DevOps Engineer Nottingham &mdash; mikeylicio.us</title>
        @else
        <title>Full Stack Developer and DevOps Engineer Nottingham &mdash; mikeylicio.us</title>
        @endif
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#4a32bd">
        <meta name="msapplication-TileColor" content="#4a32bd">
        <meta name="msapplication-TileImage" content="{{ asset('favicons/mstile-144x144.png') }}">
        <meta name="theme-color" content="#4a32bd">
        @stack('styles-before')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @stack('styles-after')

    </head>
    <body class="is-preload">
        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('posts.index')}}">Blog</a></li>
                <li><a href="{{route('pages.show', 'about')}}">About</a></li>
            </ul>
            <ul class="actions stacked">
                <li><a href="mailto:me@mikeylicio.us" class="button primary fit">Get in touch</a></li>
            </ul>
        </nav>
        
        <a href="#menu">
            <i class="fa fa-bars"></i>
        </a>

        <!-- Banner -->
        @if(View::hasSection('hero'))
        <section id="banner">
            @yield('hero')
        </section>
        @endif

        <!-- Main -->
        <section id="main" class="wrapper @yield('extraClasses')">
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
