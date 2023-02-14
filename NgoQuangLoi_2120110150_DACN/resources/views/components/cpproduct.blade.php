<div>

    <div class="container-box">
        <div class="product-box">
            <div class="product-main">
                <h1 class="about-title">for you NEW products</h1>
                <h2 class="title">New product</h2>
                <div class="product-grid">
                    @foreach ($newproduct as $item)
                        @php
                            $product_img = $item->product_img;
                            $hinh = null;
                            if (count($product_img) > 0) {
                                $hinh = $product_img[0]['image'];
                            }
                            $product_sale = $item->product_sale;
                            $sale = null;
                            $sale = $product_sale['price_sale'];
                            // print_r($product_sale);
                        @endphp
{{--                        <form action="{{route('cart.store')}}" method="POST">--}}
                            @csrf
                        <div class="showcase">
                            <div class="showcase-banner">
                                <img src="{{ asset('./images/product/' . $hinh) }}" alt="Mens Winter Leathers Jackets"
                                    width="300" class="product-img default">
                                <img src="./asset/image/product/Noel.jpg" alt="Mens Winter Leathers Jackets"
                                    width="300" class="product-img hover">

                                <p class="showcase-badge">{{ $sale }}%</p>

                                <div class="showcase-actions">
                                    <a href="{{ $item->slug }}" class="btn-action">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>

                                    <a href="{{ $item->slug }}" class="btn-action">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a href="{{route('cart.store',['id'=>$item->id])}}" class="btn-action add_to_cart" data-url="">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>

                                </div>

                            </div>

                            <div class="showcase-content">

                                {{-- <a href="#" class="showcase-category">{{ $item->category_id }}</a> --}}

                                <a href="{{ $item->slug }}">
                                    <h3 class="showcase-title">{{ $item->name }}</h3>
                                </a>
                                @if($cart->where('id',$item->id)->count())
                                    <p class="incart"><strong>In cart</strong></p>
                                @endif
{{--                                <input type="hidden" value="{{$item->id}}" name="product_id" style="padding: 2px 0;border-radius: 5px; width: 50px;">--}}
{{--                                <input type="number" value="1" name="quantity" style="padding: 2px 0;border-radius: 5px; width: 50px;">--}}

                                <div class="showcase-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                </div>

                                <div class="price-box">
                                    @php
                                        // bien tong = 0
                                        $tong = 0;
                                        // gia goc
                                        $price_buy = $item->price_buy;
                                        // gia sale
                                        $sale_price = $sale;
                                        // phep tinh
                                        $sum = $sale_price / 10;
                                        // phep tinh tong
                                        $tong = ($sum * $price_buy) / 10;
                                        $pri_sum = $price_buy - $tong;
                                    @endphp
                                    <p class="price">${{number_format($price_buy)}}</p>
                                    <del>${{number_format($tong)}}</del>
                                    <p class="price">${{number_format($pri_sum)}}</p>
                                </div>

                            </div>

                        </div>
{{--                        </form>--}}
                    @endforeach
                </div>
                <div class="page"><span>{{ $newproduct->links() }}</span></div>
            </div>

{{--            Promotion product--}}
            <div class="product-main">
                <h1 class="about-title">Product Promotion for you</h1>
                <h2 class="title">Promotion product</h2>
                <div class="product-grid">
                    @foreach ($promotionproduct as $item)
                        @php
                            $product_img = $item->product_img;
                            $hinh = null;
                            if (count($product_img) > 0) {
                                $hinh = $product_img[0]['image'];
                            }
                            $product_sale = $item->product_sale;
                            $sale = null;
                            $sale = $product_sale['price_sale'];
                            // print_r($product_sale);
                        @endphp
{{--                    <form action="{{route('cart.store')}}" method="POST">--}}
{{--                        @csrf--}}

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img src="{{ asset('./images/product/' . $hinh) }}" alt="Mens Winter Leathers Jackets"
                                    width="300" class="product-img default">
                                <img src="./asset/image/product/Noel.jpg" alt="Mens Winter Leathers Jackets"
                                    width="300" class="product-img hover">

                                <p class="showcase-badge">{{ $sale }}%</p>

                                <div class="showcase-actions">
                                    <a href="{{ $item->slug }}" class="btn-action">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>

                                    <a href="{{ $item->slug }}" class="btn-action">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <a href="{{route('cart.store',['id'=>$item->id])}}" class="btn-action add_to_cart" data-url="">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                </div>

                            </div>

                            <div class="showcase-content">

                                {{-- <a href="#" class="showcase-category">{{ $item->category_id }}</a> --}}

                                <a href="#">
                                    <h3 class="showcase-title">{{ $item->name }}</h3>
                                </a>
                                @if($cart->where('id',$item->id)->count())
                                    <p class="incart"><strong>In cart</strong></p>
                                @endif
{{--                                <input type="hidden" value="{{$item->id}}" name="product_id" style="padding: 2px 0;border-radius: 5px; width: 50px;">--}}
{{--                                <input type="number" value="1" name="quantity" style="padding: 2px 0;border-radius: 5px; width: 50px;">--}}

                                <div class="showcase-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                </div>

                                <div class="price-box">
                                    @php
                                        $tong = 0;
                                        $price_buy = $item->price_buy;
                                        $sale_price = $sale;
                                        $sum = $sale_price / 10;
                                        $tong = ($sum * $price_buy) / 10;
                                        $pri_sum = $price_buy - $tong;
                                    @endphp
                                    <p class="price">${{number_format($price_buy)}}</p>
                                    <del>${{number_format($tong)}}</del>
                                    <p class="price">${{number_format($pri_sum)}}</p>
                                </div>

                            </div>

                        </div>
{{--                    </form>--}}
                    @endforeach
                </div>
                <div class="page"><span>{{ $newproduct->links() }}</span></div>
            </div>
        </div>
    </div>
</div>
