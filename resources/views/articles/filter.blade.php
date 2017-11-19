@extends('layouts.default')

@section('title')
    Please, like these filtered articles
@endsection

@section('content')
    <div>
        <h2>Please, like these filtered articles</h2>
    </div>
    @foreach($articles as $article)
        <div><a href="/news.site/index.php/articles/{{ $article->id }}">{{ $article->title }}</a></div>
    @endforeach
@endsection