@extends ('layouts.default')

@section('title')
    Comments to moderate
@endsection

@section('content')
    <p class="btn-back">
        <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
    </p>
    <h3>Comments to moderate</h3>
    @foreach($toModerate as $comment)
        <div>
            <a href="{{ $comment->id }}/edit">{{ $comment->content }}</a>
        </div>
    @endforeach

@endsection