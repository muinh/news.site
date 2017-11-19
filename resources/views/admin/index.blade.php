@extends('layouts.default')

@section('title')
    You are on the article page!
@endsection

@section('content')
    <h2>Admin Panel</h2>
    <hr>
    <h5>Categories and articles</h5>
    <hr>
    <p><a href="{{ route('categoryCreate') }}">Add category</a></p>
    <p><a href="{{ route('articleCreate') }}">Add article</a></p>
    <hr>
    <h5>Comments</h5>
    <hr>
    <p><a href="{{ route('commentCreate') }}">Add comment</a></p>
    <p><a href="{{ route('commentIndex') }}">All comments</a></p>
    <p><a href="{{ route('commentModerate') }}">Comments to moderate</a></p>
    <hr>
    <h5>Menu</h5>
    <hr>
    <p><a href="{{ route('menuCreate') }}">Add Menu</a></p>
    <p><a href="{{ route('menuIndex') }}">All menus</a></p>
    <hr>
    <h5>Other</h5>
    <hr>
    <p><a href="{{ route('createAd') }}">Add advertisement</a></p>
    <p><a href="{{ route('chooseStyling') }}">Change styling</a></p>
@endsection