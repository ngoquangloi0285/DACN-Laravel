<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <div class="container">
        <ul class="desktop-menu-category-list">
            @foreach ($mainmenu as $item)
                <li class="menu-category">
                    <a href="{{ $item->slug }}" class="active menu-title">{{ $item->name }}</a>
                </li>
            @endforeach

            <li class="menu-category navsub">
                <!-- danh muc -->
                <a href="#" class="menu-title">Categories
                    <i class="fa-solid fa-angle-down"></i>
                </a>
                <div class="dropdown-panel">
                    @foreach ($category as $item)
                        <ul class="dropdown-panel-list">
                            <!-- Cha -->
                            <li class="menu-title">
                                <a href="{{ $item->slug }}">{{ $item->name }}</a>
                            </li>
                            <!-- Con -->
                            {{-- @foreach ($subcat as $cat)
                                <li class="panel-list-item">
                                    <a href="#">{{ $cat->name }}</a>
                                </li>
                            @endforeach --}}
                        </ul>
                    @endforeach
                </div>
            </li>


        </ul>
    </div>
</div>
