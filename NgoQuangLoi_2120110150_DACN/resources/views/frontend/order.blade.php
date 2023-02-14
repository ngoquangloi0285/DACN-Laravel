@extends('layouts.frontend.index')
@section('title-home', 'Order')
@section('product-page')
    <div class="container-box">
        <div class="product-box">

            <div class="product-main">

                <h2 class="title">Order</h2>
                <form action="{{route('cart.orderdetail')}}" method="post">
                    @csrf
                    <div class="container-order">
                        <div class="container">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address:</h4>
                            <div class="row-order">
                                <div class="col-md-6 form-group">
                                    <label for="name">Full Name</label>
                                    <input value="{{old('name')}}" id="name" placeholder="Enter name" name="name" class="form-control" type="text">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label id="email">E-mail</label>
                                    <input value="{{old('email')}}" id="email" class="form-control" type="email" placeholder="Enter email" name="email">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label id="phone">Phone number</label>
                                    <input value="{{old('phone')}}" id="phone" class="form-control" type="number" placeholder="Enter mobile number" name="phone">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label id="address">Address</label>
                                    <input value="{{old('address')}}" id="address" class="form-control" type="text" placeholder="Enter address" name="address">
                                    @if ($errors->has('address'))
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label id="note">Your note:</label>
                                    <input value="{{old('note')}}" id="note" class="form-control" type="text" placeholder="Enter your note" name="note">
                                    @if ($errors->has('note'))
                                        <div class="text-danger">{{ $errors->first('note') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-block btn-primary my-3 py-3">Pay</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
