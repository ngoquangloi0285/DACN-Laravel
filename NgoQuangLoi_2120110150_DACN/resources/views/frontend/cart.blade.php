@extends('layouts.frontend.index')
@section('title-home', 'Cart')
@section('cart')
    <form action="{{route('cart.update')}}" method="POST">
        @csrf
    <div class="cart">
        @if(session('danger'))
            <div class="alert off alert-success" role="alert">
                <i style="color: red" class="fa fa-remove"></i> {{session('danger')}}
            </div>
        @endif
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <i style="color: green" class="fa fa-check"></i> {{session('success')}}
                </div>
            @endif
            @if(session('sorry'))
                <div class="alert alert-success" role="alert">
                    <i style="color: green" class="fa fa-remove"></i> {{session('sorry')}}
                </div>
            @endif
        @if(count($cart) > 0)
            <div class="container-box">
                <div class="cart-page">
                    <table class="page-cart">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                        @foreach($cart as $item)
                            @php
                                $img = $item->attributes['img'];
//                                dd($attributes);
                                $sale = $item->attributes['sale'];
                                $slug = $item->attributes['slug'];
                                $price_sale = $sale / 10;
                                $price = $item->price;
                                $sum = ($price_sale * $price) / 10;
                                $tong = $price - $sum;
                            @endphp
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <a title="To visit product" href="{{$slug}}">
                                        <img src="{{ asset('./images/product/'. $img) }} " width="450"
                                             alt="{{$img}}">
                                    </a>

                                    <div>
                                        <p class="info">Product name: <b>{{$item->name}}</b></p>
                                        <p class="info">Item code: <b>{{$item->id}}</b></p>
                                        <p class="info">Sale: <b>{{$sale}}%</b></p>
                                        <p class="info">Sub price: $<b>{{$tong}}</b></p>
                                        <p class="info">Price: <strong>${{number_format($item->price)}}</strong></p>
                                        <a class="info" href="{{route('cart.remove',['id'=>$item->id])}}">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" min="0" name="quantity[]" value="{{$item->quantity}}"></td>

                            <td><strong>${{number_format($tong)}}</strong></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="total-price">
                    @php
                        $subTotal = Cart::getSubTotal();
                    @endphp
                    <table>
                        <tr>
                            <th>Subtotal:</th>
                            <td><strong>${{number_format($subTotal)}}</strong></td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Delivery charges:</th>--}}
{{--                            <td><strong>$10.00</strong></td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>Enter discount code</th>
                            <td><input type="text" placeholder="Enter discount code"></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><strong>${{number_format($subTotal)}}</strong></td>
                        </tr>
                        <tr>
                            <a href="{{route('cart.order')}}" class="order order">Click Oder</a>
                        </tr>
                        <tr>
                            <td><input class="cart-btn" type="submit" value="Update"></td>
                            <td><a class="cart-btn" href="#">Buy more</a></td>
                            <td><a class="cart-btn" href="{{route('cart.delete')}}">Delete Cart</a></td>
                        </tr>
                    </table>

                </div>
            </div>
            @else
                <div class="no-cart"><h1>No products...!</h1></div>
                <div class="no-cart">
                    <a class="cart-btn" href="{{route('/')}}">Buy more</a>
                </div>
            @endif
    </div>
    </form>
@endsection
