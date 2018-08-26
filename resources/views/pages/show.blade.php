@extends('layouts.master')
@section('hero')
    @component('partials.hero')
        @slot('title')
            {{$page->title}}
        @endslot

        @slot('description')
            <p style="margin: 0 auto;max-width: 50%;">{!!$page->intro!!}</p>
        @endslot
    @endcomponent
@endsection
@section('extraClasses', 'alt')
@section('title', $page->title)
@section('content')
<div class="inner">
    @if ($page->featured_image)
    <a href="{{asset('/storage/'.$page->featured_image->path)}}" class="image fit">
        <img src="{{asset('/storage/'.$page->featured_image->path)}}" alt="">
    </a>
    @endif
    {!!$page->body!!}
</div>
@endsection
