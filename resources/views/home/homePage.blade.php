@extends('layouts.home')

@section('hero')
    @include('home.inc.hero')
@endsection


@section('contents')
    @include('home.inc.featured-post')
    @include('home.inc.posts')
@endsection
