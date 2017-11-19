@extends('layouts.default')

@section('title')
    You are on the start page!
@endsection
@section('content')
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach ($sliderArts as $key => $slide)
                @if (!$key) <div class="carousel-item active">
                @else <div class="carousel-item">
                @endif
                    <div class="carousel-container">
                        <img class="d-block img-fluid" src="/news.site/public/img/{{ $slide->image }}.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="carousel-header">{{ $slide->title }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
            <div class="ad-wrapper col-md-2">
            @foreach ($leftAds as $ad)
                    <div class="ad-container">
                        <div>{{ $ad->title }}</div>
                        <span class="ad-price">{{ $ad->price }}</span>
                        <div>{{ $ad->company }}</div>
                        <div>{{ $ad->website }}</div>
                        <div class="pop-up">
                            <p class="pop-up-text">Купон на скидку - {{ $coupon() }} </p>
                            <p class="pop-up-text">Примени и получи скидку 10%!</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="group-categories col-md-8">
                <div class="col-md-12">
                    <h2 class="header-center">CATEGORIES - TOP 5 ARTICLES</h2>
                </div>
            @foreach ($categories as $category)
                    <div class="nav-item col-md-4">
                        <a class="nav-link" href="index.php/categories/{{ $category->id }}">{{ $category->title }}</a>
                        <?php $lastFiveArticles = $category->articles()->latest()->limit(5)->get() ?>
                    @foreach($lastFiveArticles as $art)
                            <p class="item-header">
                                <a href="index.php/articles/{{ $art->id }}">
                                    {{ $art->title }}
                                </a>
                            </p>
                    @endforeach
                </div>
            @endforeach
            <div class="col-md-10">
                <h2 class="header-center">TOP 5 COMMENTATORS</h2>
                @foreach($topCommentators as $user)
                    <p class="item-header">
                        <a href="index.php/users/{{ $user->id }}/comments">
                            {{ $user->name }}
                        </a>
                    </p>
                @endforeach
            </div>
            <div class="col-md-10">
                <h2 class="header-center">TOP 3 HOT TOPICS</h2>
                @foreach($hotArticles as $article)
                    <p class="item-header">
                        <a href="index.php/articles/{{ $article->id }}">
                            {{ $article->title }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
        <div class="ad-wrapper col-md-2">
            @foreach ($rightAds as $ad)
                <div class="ad-container">
                    <div>{{ $ad->title }}</div>
                    <span class="ad-price">{{ $ad->price }}</span>
                    <div>{{ $ad->company }}</div>
                    <div>{{ $ad->website }}</div>
                    <div class="pop-up">
                        <p class="pop-up-text">Купон на скидку - {{ $coupon() }}</p>
                        <p class="pop-up-text">Примени и получи скидку 10%!</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="search-container">
            <h3 class="search-header">Search by filter:</h3>
            <div class="col-md-12 search-wrapper">
                <form action="{{ route('articleFilter') }} " method="post">
                    <div class="search-table">
                        <div class="col-md-3 search-delimeter">
                            <div>
                                <label for="filter-date-from">Date from:</label>
                            </div>
                            <div>
                                <input name="filter-date-from" id="filter-date-from" type="date">
                            </div>
                        </div>
                        <div class="col-md-3 search-delimeter">
                            <div>
                                <label for="filter-date-to">Date to:</label>
                            </div>
                            <div>
                                <input name="filter-date-to" id="filter-date-to" type="date">
                            </div>
                        </div>
                        <div class="col-md-3 search-delimeter">
                            <div>
                                <label for="filter-tags">Tags</label>
                            </div>
                            @foreach($tags as $tag)
                                <span class="col-md-3">
                                    <input name="filter-tags[]" type="checkbox" value="{{ $tag->id }}">{{ $tag->title }}
                                </span>
                            @endforeach
                        </div>
                        <div class="col-md-2 search-delimeter">
                            <div>
                                <label for="filter-categories">Categories</label>
                            </div>
                            @foreach($categories as $category)
                                <div>
                                    <input name="filter-categories[]" type="checkbox" value="{{ $category->id }}">{{ $category->title }}
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-2 search-delimeter">
                            <button type="submit" class="btn btn-primary search-button">Search</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection