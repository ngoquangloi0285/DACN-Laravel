@extends('layouts.frontend.index')
@section('title-home', $product->name)
@section('product-page')
    <div class="container-box">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    @php
                        $product_img = $product->product_img;
                        $hinh = null;
                        if (count($product_img) > 0) {
                            $hinh = $product_img[0]['image'];
                        }
                        $product_sale = $product->product_sale;
                        $sale = null;
                        $sale = $product_sale['price_sale'];
                    @endphp
                    <p><span><a href="{{route('/')}}">Home</a></span>/<span><a href="{{ $product->slug }}">{{$product->name}}</a></span></p>
                    <img width="100%" src="{{asset('./images/product/'.$hinh)}}" alt="">

                </div>
                <div class="col-2">
                    <div class="info-product">
                        <h1>{{$product->name}}</h1>
                        <div class="product-star">
                            <span class="price">4.8</span>
                            <i class="icon fa fa-star"></i>
                            <i class="icon fa fa-star"></i>
                            <i class="icon fa fa-star"></i>
                            <i class="icon fa fa-star"></i>
                            <i class="icon fa fa-star-half"></i>
                            <span><strong>Evaluate</strong> 720</span>
                            <span><strong>Sold</strong> 2k</span>
                            @php
                                // bien tong = 0
                                $tong = 0;
                                // gia goc
                                $price_buy = $product->price_buy;
                                // gia sale
                                $sale_price = $sale;
                                // phep tinh
                                $sum = $sale_price / 10;
                                // phep tinh tong
                                $tong = ($sum * $price_buy) / 10;
                            @endphp
                            <p class="price-detail"><strong>{{$price_buy}}</strong></p>
                            <p class="price-detail"><strong>{{$tong}}</strong>
                                <span class="sale">{{$sale_price}}%</span>
                            </p>
                            <p class="price-detail"><strong>Flash Sale</strong> Begin today to 15-1-2023</p>
                            <p class="price-detail"><strong>Detail:</strong> {{$product->detail}}</p>
                        </div>
                        <p class="price-detail">Color: </p>
                        <select class="price-detail">
                            <option>Select color</option>
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Green</option>
                        </select>
                        <p class="price-detail">Quanity: </p>
                        <input class="price-detail" type="number" value="1" style="width: 150px;padding: 10px">
                        <a style="padding: 5px; background: green; color: #fff;font-size: 20px; width: 150px;font-weight: bold" href="{{route('cart.store',['id'=>$product->id])}}"  class="price-detail" type="submit">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
