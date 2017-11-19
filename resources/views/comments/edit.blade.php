@extends ('layouts.default')

@section('title')
    Comment {{ $comment->id }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Edit comment</h3>
            <form action="{{ route('commentUpdate') }}" method="post">
                <div class="form-group">
                    <label for="comments-edit-id">Comment ID</label>
                    <input type="text" class="form-control" name="comments-edit-id" id="comments-edit-id" value="{{ $comment->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="comments-edit-post-id">Article ID</label>
                    <input type="number" class="form-control" name="comments-edit-post-id" id="comments-edit-post-id" value="{{ $comment->article_id }}">
                </div>
                <div class="form-group">
                    <label for="comments-edit-user-id">User ID</label>
                    <input type="number" class="form-control" name="comments-edit-user-id" id="comments-edit-user-id" value="{{ $comment->user_id }}">
                </div>
                <div class="form-group">
                    <label for="comments-edit-parent-id">Parent ID</label>
                    <input type="number" class="form-control" name="comments-edit-parent-id" id="comments-edit-parent-id" value="{{ $comment->parent_id }}">
                </div>
                <div class="form-group">
                    <label for="comments-edit-content">Comment Text</label>
                    <input type="text" class="form-control" name="comments-edit-content" id="comments-edit-content" value="{{ $comment->content }}">
                </div>
                <div class="form-group">
                    <label for="comments-edit-rate">Comment Rate</label>
                    <input type="number" class="form-control" name="comments-edit-rate" id="comments-edit-rate" value="{{ $comment->rate }}">
                </div>
                <div style="display: flex" class="form-group">
                    <div style="width: 5%; margin-top: .5%;">
                        <input type="checkbox" class="form-control" name="comments-edit-hidden" id="comments-edit-hidden" value="1" @if($comment->hidden) checked @endif>
                    </div>
                    <div>
                        <label for="comments-edit-hidden">Comment hidden</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit comment</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                {{ method_field('PUT') }}
            </form>
        </div>
    </div>

@endsection