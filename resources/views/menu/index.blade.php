@extends ('layouts.default')

@section('title')
    All menus
@endsection

@section('content')
    <p class="btn-back">
        <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
    </p>
    <h2>All menus</h2>
    @foreach($menus as $menu)
        <div>
            <a href="menu/{{ $menu->id }}/edit">{{ $menu->title }}</a>
        </div>
    @endforeach

@endsection