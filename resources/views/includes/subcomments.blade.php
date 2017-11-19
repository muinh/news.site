@foreach($items as $i)
    <li>
        {{ $i->title }}
        @if($i->hasChildren())
            <ul>
                @include('includes.subcomments', ['items' => $i->children()])
            </ul>
        @endif
    </li>
@endforeach