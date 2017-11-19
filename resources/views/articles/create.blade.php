@extends('layouts.default')

@section('title')
    Add new article
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="btn-back">
                <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
            </p>
            <h2>Add new article</h2>
            <form action="{{ route('articleStore') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="article-title">Article Title</label>
                    <input type="text" class="form-control" name="article-title" id="article-title">
                </div>
                <div class="form-group">
                    <label for="article-body">Article Body</label>
                    <input type="text" class="form-control" name="article-body" id="article-body">
                </div>
                <div class="form-group">
                    <label for="article-image">Article Image</label>
                    <input type="file" class="form-control" name="article-image" id="article-image">
                </div>
                <div class="form-group">
                    <label for="article-alias">Article Alias</label>
                    <input type="text" class="form-control" name="article-alias" id="article-alias">
                </div>
                <div class="form-group">
                    <label for="article-categories">Article Categories (use ',' as a delimeter e.g 1,2,8)</label>
                    <input type="text" class="form-control" name="article-categories" id="article-categories">
                </div>
                <div class="form-group">
                    <label for="article-tags">Article Tags (use ',' as a delimeter e.g 1,2,8)</label>
                    <input type="text" class="form-control" name="article-tags" id="article-tags">
                </div>
                <button type="submit" class="btn btn-primary">Add article</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection