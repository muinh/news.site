@extends('layouts.default')

@section('title')
    Add new category
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="btn-back">
                <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
            </p>
            <h2>Add new category</h2>
            <form action="{{ route('categoryStore') }}" method="post">
                <div class="form-group">
                    <label for="category-title">Category Title</label>
                    <input type="text" class="form-control" name="category-title" id="category-title">
                </div>
                <div class="form-group">
                    <label for="category-alias">Category Alias</label>
                    <input type="text" class="form-control" name="category-alias" id="category-alias">
                </div>
                <button type="submit" class="btn btn-primary">Add category</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection