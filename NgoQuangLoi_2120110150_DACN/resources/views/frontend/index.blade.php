@extends('layouts.frontend.index')
@section('title-home', 'Home')
@section('slider')
    <x-cpslider />
@endsection
@section('nav-header')
    <nav class="desktop-navigation-menu">
        <x-cpmainmenu :menu="$menu" :listcategory="$listcategory" />
    </nav>
@endsection
@section('product-home')
<x-cpproduct/>
@endsection
