@foreach($items as $i)
    <li class="dropdown-submenu">
        <a class="nav-link" href="#" data-toggle="dropdown" >{{ $i->title }}</a>
        @if($i->hasChildren())
            <ul class="dropdown-menu">
                @include('includes.menu', ['items' => $i->children()])
            </ul>
        @endif
    </li>
@endforeach