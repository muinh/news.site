@extends('layouts.default')

@section('title')
    You are on the tag page!
@endsection

@section('content')
    <div>
        <h2>{{ $tag->title }}</h2>
    </div>
    @foreach($paginated as $article)
        <div><a href="/news.site/index.php/articles/{{ $article->id }}">{{ $article->title }}</a></div>
    @endforeach

    {{ $paginated }}
@endsection