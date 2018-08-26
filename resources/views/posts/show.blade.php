@extends('layouts.master')
@section('extraClasses', 'alt')
@section('content')
<div class="inner">
    <header class="major special">
        <h2>{{$post->title}}</h2>
        <p>{{$post->published_at->format('jS F Y \a\t g:i:a')}}</p>
    </header>
    @if ($post->featured_image)
    <a href="{{asset('/storage/'.$post->featured_image->path)}}" target="_blank" class="image fit">
        <img src="{{asset('/storage/'.$post->featured_image->path)}}" alt="{{$post->title}}">
    </a>
    @endif


    @if ($post->created_at->lte('2015'))
    {!!nl2br($post->body)!!}
    @else
    {!!$post->body!!}
    @endif

</div>
@endsection
