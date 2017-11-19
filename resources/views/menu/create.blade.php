@extends ('layouts.default')

@section('title')
    Sign-In Page
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <p class="btn-back">
            <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
        </p>
        <h3>Add new menu</h3>
        <form action="{{ route('menuStore') }}" method="post">
            <div class="form-group">
                <label for="menus-add-title">Menu Title</label>
                <input type="text" class="form-control" name="menus-add-title" id="menus-add-title" value="{{ Request::old('menus-add-title') }}">
            </div>
            <div class="form-group">
                <label for="menus-add-url">Menu Url</label>
                <input type="text" class="form-control" name="menus-add-url" id="menus-add-url" value="{{ Request::old('menus-add-url') }}">
            </div>
            <div class="form-group">
                <label for="menus-add-parent">Menu Parent</label>
                <input type="text" class="form-control" name="menus-add-parent" id="menus-add-parent" value="{{ Request::old('menus-add-parent') }}">
            </div>
            <button type="submit" class="btn btn-primary">Add menu</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>

@endsection