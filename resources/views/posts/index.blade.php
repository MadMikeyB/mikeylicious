@extends('layouts.master')
@section('hero')
    @component('partials.hero')
        @slot('title')
            Blogs
        @endslot

        @slot('description')
            <p>Occasionally I'll write about various matters, industry news, package releases or just general rants. You can find all of my posts below.</p>
        @endslot
    @endcomponent
@endsection

@section('content')
<div class="inner">
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
        {{$posts->links()}}
    </section>
</div>
@endsection
