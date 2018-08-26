@extends('layouts.master')

@section('hero')
    @component('partials.hero')
        @slot('title')
            Hi, I'm Mikey.
        @endslot

        @slot('description')
            <p>I'm a {{ date('Y') - 1991 }} year old web developer from Nottingham in the UK.</p> 
            <p>I specialise in <a href="https://laravel.com" target="_blank">Laravel</a>, but I am also proficient in <a href="#languages" class="scrolly">many other programming languages</a>.</p> 
            <p>I have been developing for the web for {{ date('Y') - 2004 }} years, and have been doing so commercially for {{ date('Y') - 2010 }} years.</p>
            <p>I'm currently the Lead Developer at <a href="https://fifteen.co.uk" target="_blank">Fifteen</a>, and <a href="#contact" class="scrolly">available for freelance work.</a></p>
            <br>
        @endslot
    @endcomponent
@endsection

@section('content')
<div class="inner">
    {{-- About --}}
    @php
        $intro = $page->fields->where('key', 'what_i_do')->first();
    @endphp
    @if ($intro)
    <section id="languages" class="special">
        <header class="major">
            <h2>{{$intro->title}}</h2>
            {!!$intro->body!!}
        </header>
        <ul class="icons large series">
            <li title="Laravel" class="icon fab fa-laravel"></li>
            <li title="VueJS" class="icon fab fa-vuejs"></li>
            <li title="PHP7" class="icon fab fa-php"></li>
            <li title="HTML5" class="icon fab fa-html5"></li>
            <li title="CSS3" class="icon fab fa-css3-alt"></li>
            <li title="ECMAScript" class="icon fab fa-js"></li>
            <li title="NodeJS" class="icon fab fa-node-js"></li>
            <li title="Python3" class="icon fab fa-python"></li>
            <li title="MySQL, MariaDB Databases" class="icon fas fa-database"></li>
            <li title="DevOps" class="icon fas fa-server"></li>
            <li title="WordPress" class="icon fab fa-wordpress-simple"></li>
        </ul>
    </section>
    @endif
    {{-- / About --}}

    {{-- Portfolio --}}
    @php
        $portfolioIntro = $page->fields->where('key', 'previous_projects')->first();
    @endphp
    @if ($portfolioIntro)
    <section class="special">
        <header class="major">
            <h2>{{$portfolioIntro->title}}</h2>
            {!!$portfolioIntro->body!!}
        </header>
    </section>
    @endif
    <section class="highlights">
        @foreach ($portfolios as $portfolio)
        <section>
            @if ($portfolio->featured_image)
            <a class="image" href="{{$portfolio->link}}" target="_blank">
                <img src="{{asset('/storage/'.$portfolio->featured_image->path)}}" data-position="center center" alt="{{$portfolio->title}}">
            </a>
            @endif
            <div class="content">
                <header class="major">
                    <h2>{{$portfolio->title}}</h2>
                    <p>{!!$portfolio->intro!!}</p>
                </header>
                {!!$portfolio->body!!}
                <ul class="actions">
                    <li><a href="{{$portfolio->link}}" target="_blank" class="button">Visit {{$portfolio->title}}</a></li>
                </ul>
            </div>
        </section>
        @endforeach
    </section>

    <!-- Blog -->
    @php
        $blogIntro = $page->fields->where('key', 'blog_intro')->first();
    @endphp
    @if ($blogIntro)
    <section id="blog-intro" class="special">
        <header class="major">
            <h2>{{$blogIntro->title}}</h2>
            <p>{!!$blogIntro->body!!}</p>
        </header>
        <footer class="major">
            <ul class="actions special">
                <li><a href="{{route('posts.index')}}" class="button">View All</a></li>
            </ul>
        </footer>
    </section>
    @endif

    <section id="blog" class="spotlights special">
        @foreach ($posts as $post)
        <section>
            <header class="major">
                <h3><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h3>
                <small>{{$post->published_at->format('jS F Y \a\t g:i:a')}}</small>
            </header>
            @if ($post->featured_image)
            <div class="image fit">
                <a href="{{route('posts.show', $post)}}">
                    <img src="{{asset('/storage/'.$post->featured_image->path)}}" alt="{{$post->title}}">
                </a>
            </div>
            @endif
            <p>{!!$post->excerpt!!}</p>
            <ul class="actions special">
                <li><a href="{{route('posts.show', $post)}}" class="button">Learn More</a></li>
            </ul>
        </section>
        @endforeach
    </section>
</div>
@endsection
