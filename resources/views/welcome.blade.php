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

@endsection
