@extends('layouts.default')

@section('title')
    You are on the article page!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="btn-back">
                <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
            </p>
            <h3>Website styling</h3>
            <form action="{{ route('updateStyling') }}" method="post">
                <div class="form-group">
                    <label for="styling-header">Set header color</label>
                    <input type="text" class="form-control" name="styling-header" id="styling-header" value="{{ $headerColor }}">
                </div>
                <div class="form-group">
                    <label for="styling-background">Set background color</label>
                    <input type="text" class="form-control" name="styling-background" id="styling-background" value="{{ $backgroundColor }}">
                </div>
                <button type="submit" class="btn btn-primary">Apply changes</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
@endsection