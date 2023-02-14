<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <section class="section container" style="background-color: #E87800;">
        <div id="slide">
            @foreach ($list_slider as $slider)
                @if ($loop->first)
                    <div class="item"
                        style="background-image: url({{ asset('images/slider/' . $slider->image) }});">
                        <div class="content">
                            <p class="subtitle">{{ $slider->title }}</p>
                            <h2 class="title">Happy new year</h2>
                            <p class="text">
                                Happy new year <b>2023</b>.00
                            </p>
                            <a href="#" class="btn">Shop now</a>
                        </div>
                    </div>
                @else
                    <div class="item"
                        style="background-image: url({{ asset('images/slider/' . $slider->image) }});">
                        <div class="content">
                            <p class="subtitle">Happy new year</p>
                            <h2 class="title">Happy new year</h2>
                            <p class="text">
                                Happy new year <b>2023</b>.00
                            </p>
                            <a href="#" class="btn">Shop now</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="button">
            <button class="arrow" id="prev">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="arrow" id="next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>
</div>
