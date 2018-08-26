@extends('layouts.master')
@section('hero')
    @component('partials.hero')
        @slot('title')
            {{$post->title}}
        @endslot

        @slot('description')
            @if ($post->published_at)
                <p>{{$post->published_at->format('jS F Y \a\t g:i:a')}}</p>
            @endif
            <p>{!!$post->intro!!}</p>
        @endslot
    @endcomponent
@endsection
@section('extraClasses', 'alt')
@section('title', $post->title)
@section('content')
<div class="inner">
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
