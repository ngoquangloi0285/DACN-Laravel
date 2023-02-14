@extends('layouts.frontend.index')
@section('title-home', 'Contact')
@section('product-page')
    <div class="container-box">
        <div class="product-box">

            <div class="product-main">

                <h2 class="title">Contact with US</h2>

                <div class="product-grid">

                    <div class="showcase">

                        <div class="showcase-banner">
                            <img src="{{ asset('./assets-frontend/image/product/product0.jpg') }}"
                                alt="Black Floral Wrap Midi Skirt" class="product-img default" width="300">
                            <img src="./asset/image/product/Noel.jpg" alt="Black Floral Wrap Midi Skirt"
                                class="product-img hover" width="300">

                            <p class="showcase-badge angle pink">new</p>

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <i class="fa-regular fa-heart"></i>
                                </button>

                                <button class="btn-action">
                                    <i class="fa-regular fa-eye"></i>
                                </button>

                                <button class="btn-action">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category">skirt</a>

                            <h3>
                                <a href="#" class="showcase-title">Black Floral Wrap Midi Skirt</a>
                            </h3>

                            <div class="showcase-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                            </div>

                            <div class="price-box">
                                <p class="price">$25.00</p>
                                <del>$35.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
