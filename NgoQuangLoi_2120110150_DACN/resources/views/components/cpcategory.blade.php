    @if (count($list_category) > 0)
        <ul class="dropdown-panel-list">
            <hr>
            @foreach($list_category as $item)
                <li class="panel-list-item">
                    <a href="{{route('slug.home',['slug'=>$item->slug])}}">{{$item->name}}</a>
                </li>
            @endforeach
            <!-- Con -->
        </ul>
    @endif
