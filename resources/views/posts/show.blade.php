@extends('layouts.master')
@section('extraClasses', 'alt')
@section('content')
<div class="inner">
    <header class="major special">
        <h2>{{$post->title}}</h2>
        <p>{{$post->published_at->format('jS F Y \a\t g:i:a')}}</p>
    </header>
    @if ($post->featured_image)
    <a href="{{asset($post->featured_image->path)}}" target="_blank" class="image fit">
        <img src="{{asset($post->featured_image->path)}}" alt="{{$post->title}}">
    </a>
    @endif


    @if (!str_contains($post->created_at, 2018))
    {!!nl2br($post->body)!!}
    @else
    {!!$post->body!!}
    @endif

</div>
@endsection