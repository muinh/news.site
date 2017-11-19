@extends('layouts.default')

@section('title')
    Search results by tag
@endsection

@section('content')
    <div>
        <h2>All results by your request: {{ $tagObj->title }}</h2>
    </div>
    @foreach($articles as $article)
        <div><a href="/news.site/index.php/articles/{{ $article->id }}">{{ $article->title }}</a></div>
    @endforeach

    {{ $articles }}
@endsection
