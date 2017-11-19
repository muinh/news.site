@extends ('layouts.default')

@section('title')
    All comments
@endsection

@section('content')
    <p class="btn-back">
        <a href="{{ route('admin') }}" class="btn-normal"><< Back to Admin Panel Main Page</a>
    </p>
    <h3>Comments</h3>
    @foreach($comments as $comment)
        <div>
            <a href="comments/{{ $comment->id }}/edit">{{ $comment->content }}</a>
        </div>
    @endforeach

@endsection