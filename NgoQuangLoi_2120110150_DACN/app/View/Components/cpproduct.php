<?php

namespace App\View\Components;

use App\Models\Orderdetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class cpproduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $newproduct = Product::where([['status', '=', '1'],['sale', '=', '0']])->orderBy('created_at','DESC')->paginate(8);
        $promotionproduct = Product::where([['status', '=', '1'],['sale', '=', '1']])->orderBy('created_at','DESC')->paginate(8);
        $cart = Cart::getContent();
        return view('components.cpproduct',compact('newproduct','promotionproduct','cart'));
    }
}
