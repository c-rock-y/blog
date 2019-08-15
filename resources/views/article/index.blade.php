@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h1>{{ config('blog.article.title') }}</h1>

        <h4>{{ config('blog.article.description') }}</h4>
    @endcomponent

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection