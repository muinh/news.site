<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Comment;

$settings = DB::table('styling')->get();
$headerColor = $settings->first()->header_color;

$menus = DB::table('menus')->get();
$mBuilder = Menu::make('MyNav', function($m) use ($menus) {
    foreach($menus as $item) {
        if($item->parentId == 0) {
            $m->add($item->title, $item->url)->id($item->id);
        } else {
            if($m->find($item->parentId)) {
                $m->find($item->parentId)->add($item->title, $item->url)->id($item->id);
            }
        }
    }
});
?>
<nav style="background-color: {{ $headerColor }}" class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="{{ route('home') }}">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php $ex = $mBuilder->roots() ?>

      @foreach($ex as $ii)
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              @if($ii->hasChildren())
                <li class="nav-item dropdown">
                    <a href="{{ $ii->url() }}" class="nav-link" data-toggle="dropdown">
                        {{ $ii->title }}
                    </a>
                  <ul class="dropdown-menu multi-level">
                      @include('includes.menu', ['items' => $ii->children()])
                  </ul>
              @else
                <a href="{{ $ii->url() }}" class="nav-link">
                    {{ $ii->title }}
                </a>
              @endif
          </li>
        </ul>
      @endforeach
          @if(Auth::check())
              <li class="marker-logout">
                  <form class="form-logout" action="/news.site/index.php/logout" method="post">
                      <button class="btn-logout">Logout</button>
                      {{ csrf_field() }}
                  </form>
              </li>
              <li class="marker-logout">
                  <a class="marker-link" href="/news.site/index.php/admin">Admin</a>
              </li>
          @endif
          <div class="panel-body">
              @if(Auth::check())
                  <span>Welcome, {{ Auth::user()->name }}!</span>
              @endif
          </div>
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
          <script>
              $(function() {
                  $("#search").autocomplete({
                      source: 'http://localhost/news.site/index.php/search'
                  });
              });
          </script>
    <form action="{{ route('tagSearch') }}" method="post" class="form-inline my-2 my-lg-0 search-form">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search by tag" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        {!! csrf_field() !!}
    </form>
  </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</nav>