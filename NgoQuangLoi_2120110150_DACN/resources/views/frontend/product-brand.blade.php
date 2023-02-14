@extends('layouts.frontend.index')
@section('title-home', $row_brand->name)
@section('nav-product_cat')
    <nav class="desktop-navigation-menu">
        <div class="container">
            <h1 class="about-title">Products by type</h1>
            <hr>
            <ul class="desktop-menu-category-list">
                <li class="menu-category navsub">
                    <!-- danh muc -->
                    <a href="#" class="menu-title">Brand
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <div class="dropdown-panel">
                        <x-cpbrand />
                    </div>
                </li>
                <li class="menu-category navsub">
                    <!-- danh muc -->
                    <a href="#" class="menu-title">Categories
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <div class="dropdown-panel">
                        <x-cpcategory />
                    </div>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('product-page')
    <div class="container-box">
        <div class="product-box">
            <div class="product-main">
                <h2 class="title">
                    {{ $row_brand->name }}
                </h2>

                <div class="product-grid">
                    @foreach ($product_list as $item)
                        @php
                            $product_img = $item->product_img;
                            $hinh = null;
                            if (count($product_img) > 0) {
                                $hinh = $product_img[0]['image'];
                            }
                            $product_sale = $item->product_sale;
                            $sale = null;
                            $sale = 0;
                            // print_r($product_sale);
                        @endphp
                        <div class="showcase">

                            <div class="showcase-banner">

                                <img src="{{ asset('./images/product/' . $hinh) }}" alt="Mens Winter Leathers Jackets"
                                    width="300" class="product-img default">
                                <img src="./asset/image/product/Noel.jpg" alt="Mens Winter Leathers Jackets" width="300"
                                    class="product-img hover">

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

                                {{-- <a href="{{ $item->slug }}" class="showcase-category">jacket</a> --}}

                                <a href="{{ $item->slug }}">
                                    <h3 class="showcase-title">{{ $item->name }}</h3>
                                </a>

                                <div class="showcase-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                </div>

                                <div class="price-box">
                                    <p class="price">${{ $item->price_buy }}</p>
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
                                    @endphp
                                    <del>${{ $tong }}</del>
                                </div>

                            </div>

                        </div>
                    @endforeach
                    <div>{{ $product_list->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
