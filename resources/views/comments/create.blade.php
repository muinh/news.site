@extends('layouts.default')

@section('title')
    Add new comment
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="btn-back">
                <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
            </p>
            <h2>Add new comment</h2>
            <form action="{{ route('commentStore') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="comment-post">Post ID</label>
                    <input type="number" class="form-control" name="comment-post" id="comment-post">
                </div>
                <div class="form-group">
                    <label for="comment-user">User ID</label>
                    <input type="number" class="form-control" name="comment-user" id="comment-user">
                </div>
                <div class="form-group">
                    <label for="comment-parent">Parent Comment ID</label>
                    <input type="number" class="form-control" name="comment-parent" id="comment-parent">
                </div>
                <div class="form-group">
                    <label for="comment-content">Content</label>
                    <input type="text" class="form-control" name="comment-content" id="comment-content">
                </div>
                <div class="form-group">
                    <label for="comment-rate">Comment Rate</label>
                    <input type="number" class="form-control" name="comment-rate" id="comment-rate">
                </div>
                <button type="submit" class="btn btn-primary">Add comment</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection