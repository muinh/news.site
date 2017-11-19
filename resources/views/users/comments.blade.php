@extends('layouts.default')

@section('title')
    Show comments of the {{ $user->name }}
@endsection

@section('content')
    <h2>User {{ $user->name }}</h2>
    @foreach($comments as $comment)
        <p><strong>{{ $user->name }}:</strong></p>
        <p>{{ $comment->content }}</p>
    @endforeach

    {{ $comments }}
@endsection