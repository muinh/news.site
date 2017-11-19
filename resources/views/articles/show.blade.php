@extends('layouts.default')

@section('title')
    You are on the article page!
@endsection

<?php
    $comments = $article->comments;
    $mBuilder = Menu::make('MyComments', function($m) use ($comments) {
        foreach($comments as $c) {
            if($c->parent_id == 0) {
                $m->add($c->content, $c->user_id, $c->id)->id($c->id);
            } else {
                if($m->find($c->parent_id)) {
                    $m->find($c->parent_id)->add($c->content, $c->user_id, $c->id)->id($c->id);
                }
            }
        }
    });
?>

@section('content')
   <div class="col-md-6 article-block">
       <h2>{{ $article->title }}</h2>
       <div>
           <img class="article-image" src="/news.site/public/img/{{ $article->alias }}.jpg" alt="{{ $article->alias }}">
       </div>
       @if(!$isAnalytics)
           <div>{{ $article->body }}</div>
       @else
           @if(Auth::check())
               <div>{{ $article->body }}</div>
           @else
               <div>{{ $firstFiveSentences }}<span class="article-warning">...Please, log in to read the whole text.</span></div>
           @endif
       @endif
       <div class="article-tagblock">
           @foreach($article->tags as $tag)
                <span class="article-tag">
                    <a href="/news.site/index.php/tags/{{ $tag->id }}">
                        {{ $tag->title }}
                    </a>
                </span>
           @endforeach
       </div>
       <div class="comments-block">
           @if(Auth::check())
               <div class="comments-box">
                   <form action="{{ route('commentStore') }}" method="post">
                       <textarea name="comment-content" class="comment-box" id="comment-box" cols="10" rows="5"></textarea>
                       <input type="hidden" name="comment-post" value="{{ $article->id }}">
                       <input type="hidden" name="comment-user" value="{{ Auth::user()->id }}">
                       <input type="hidden" name="comment-parent" value="0">
                       <input type="hidden" name="comment-rate" value="0">
                       <input type="hidden" name="article-category" value="@foreach($article->categories as $category) {{ $category->id }} @endforeach">
                       <button type="submit" class="btn btn-primary">Post comment</button>
                       {{ csrf_field() }}
                   </form>
               </div>
           @endif
           <div class="comments-display">
               <?php $ex = $mBuilder->roots() ?>
               @foreach($ex as $ii)
                       @if($ii->hasChildren())
                               <a href="{{ $ii->id }}" class="nav-link" data-toggle="dropdown">
                                   {{ $ii->title }}
                               </a>
                               <ul>
                                   @include('includes.subcomments', ['items' => $ii->children()])
                               </ul>
                       @else
                           <a href="{{ $ii->id }}" class="nav-link">
                               {{ $ii->title }}
                           </a>
                       @endif
               @endforeach
               @foreach($visibleComments as $comment)
                   <div class="comment" data-comment="{{ $comment->id }}">
                       <p class="comment-author">{{ $comment->username }}</p>
                       <div class="comment-wrapper">
                           <p class="comment-text">{{ $comment->content }}</p>
                       </div>
                       @if(Auth::check())
                           @if($comment->user_id === Auth::user()->id)
                               @if (((strtotime(date('Y-m-d H:i:s')) - strtotime($comment->created_at))/60) < 1)
                                   <form class="edit-form" action="{{ route('commentUpdate') }}" method="post">
                                       <textarea class="edit-window" name="comments-edit-content" cols="30" rows="5"></textarea>
                                       <input type="hidden" name="comments-edit-id" value="{{ $comment->id }}">
                                       <input type="hidden" name="comments-edit-post-id" value="{{ $comment->article_id }}">
                                       <input type="hidden" name="comments-edit-user-id" value="{{ $comment->user_id }}">
                                       <input type="hidden" name="comments-edit-parent-id" value="{{ $comment->parent_id }}">
                                       <input type="hidden" name="comments-edit-rate" value="{{ $comment->rate }}">
                                       <input type="hidden" name="comments-edit-hidden" value="{{ $comment->hidden }}">
                                       <button>Save changes</button>
                                       {{ method_field('PUT') }}
                                       {{ csrf_field() }}
                                   </form>
                               @endif
                           @endif
                       @endif
                       <div class="comment-likes">
                           <span class="comment-value">{{ $comment->rate }}</span>
                           <span class="comment-like">Like</span>
                           <span class="comment-dislike">Dislike</span>
                           @if(Auth::check())
                               @if($comment->user_id === Auth::user()->id)
                                   @if (((strtotime(date('Y-m-d H:i:s')) - strtotime($comment->created_at))/60) < 1)
                                       <span class="comment-edit">Edit comment</span>
                                   @endif
                               @endif
                           @endif
                       </div>
                   </div>
                   @if(Auth::check())
                   <div class="comment-answer">
                       <a class="nav-link">Comment message</a>
                   </div>
                   <div class="comment-answer-block">
                       <form class="answer-comment-form" action="{{ route('commentStore') }}" method="post">
                           <textarea class="edit-window" name="comment-content" cols="56" rows="5"></textarea>
                           <input type="hidden" name="comment-post" value="{{ $comment->article_id }}">
                           <input type="hidden" name="comment-user" value="{{ Auth::user()->id }}">
                           <input type="hidden" name="comment-parent" value="{{ $comment->id }}">
                           <input type="hidden" name="comment-rate" value="0">
                           <input type="hidden" name="article-category" value="@foreach($article->categories as $category) {{ $category->id }} @endforeach">
                           <button>Save changes</button>
                           {{ csrf_field() }}
                       </form>
                   </div>
                   @endif
               @endforeach
           </div>
       </div>
   </div>
    <div class="col-md-6 visit-stats">
        <h3>Now Reading:</h3>
        <h3 class="now-reading">0</h3>
        <p class="visit-text">Visitors</p>
        <h3>Total Have Read:</h3>
        <h3 class="total-readers">0</h3>
        <p class="visit-text">Readers</p>
    </div>
@endsection