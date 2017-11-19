@extends ('layouts.default')

@section('title')
    Menu {{ $menu->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Edit menu</h3>
            <form action="{{ route('menuUpdate') }}" method="post">
                <div class="form-group">
                    <label for="menus-edit-id">Menu ID</label>
                    <input type="text" class="form-control" name="menus-edit-id" id="menus-edit-id" value="{{ $menu->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="menus-edit-title">Menu Title</label>
                    <input type="text" class="form-control" name="menus-edit-title" id="menus-edit-title" value="{{ $menu->title }}">
                </div>
                <div class="form-group">
                    <label for="menus-edit-url">Menu Url</label>
                    <input type="text" class="form-control" name="menus-edit-url" id="menus-edit-url" value="{{ $menu->url }}">
                </div>
                <div class="form-group">
                    <label for="menus-edit-parent">Menu Parent</label>
                    <input type="text" class="form-control" name="menus-edit-parent" id="menus-edit-parent" value="{{ $menu->parentId }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit menu</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                {{ method_field('PUT') }}
            </form>
        </div>
    </div>

@endsection