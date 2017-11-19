@extends ('layouts.default')

@section('title')
    Add Advertisement Page
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <p class="btn-back">
            <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
        </p>
        <h3>Add new advertisement</h3>
        <form action="{{ route('saveAd') }}" method="post">
            <div class="form-group">
                <label for="ads-add-title">Advertisement Title</label>
                <input type="text" class="form-control" name="ads-add-title" id="ads-add-title" value="{{ Request::old('ads-add-title') }}">
            </div>
            <div class="form-group">
                <label for="ads-add-price">Advertisement Price</label>
                <input type="text" class="form-control" name="ads-add-price" id="ads-add-price" value="{{ Request::old('ads-add-price') }}">
            </div>
            <div class="form-group">
                <label for="ads-add-company">Company</label>
                <input type="text" class="form-control" name="ads-add-company" id="ads-add-company" value="{{ Request::old('ads-add-company') }}">
            </div>
            <div class="form-group">
                <label for="ads-add-website">Website</label>
                <input type="ads-add-website" class="form-control" name="ads-add-website" id="ads-add-website" value="{{ Request::old('ads-add-website') }}">
            </div>
            <div class="form-group">
                <label>Side</label>
                <label class="radio-inline"><input type="radio" name="ads-add-side" value="1">Left</label>
                <label class="radio-inline"><input type="radio" name="ads-add-side" value="0">Right</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@endsection