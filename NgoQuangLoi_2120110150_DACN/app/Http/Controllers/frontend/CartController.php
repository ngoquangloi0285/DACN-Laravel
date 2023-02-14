<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartStoreRequest;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSale;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index() {
        $cart = \Cart::getContent();
//        dd($cart);
        return view('frontend.cart',compact('cart'));
    }
    function store(Request $request,$id) {
        if (Auth::id()){
            $product = Product::find($id);
            $product_img= ProductImage::get();
            $product_sale= ProductSale::get();
            $img = null;
            $sale = null;

            foreach ($product_sale as $item) {
                if ($product->id == $item->product_id){
                    $sale = $item->price_sale;
//                echo $sale;
                }
            }
            foreach ($product_img as $item) {
                if ($product->id == $item->product_id){
                    $img = $item->image;
//                echo $img;
                }
            }
            \Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price_buy,
                'price_sale' => $sale,
                'quantity' => 1,
                'attributes' => array(
                    'img'=>$img,
                    'sale'=>$sale,
                    'slug'=>$product->slug,
                )
            ));
        }else {
            return redirect()->route('auth.login');
        }

       return redirect()->route('/')->with('success','Add Item To Cart Successful');
    }
    function remove($id=null) {
        if ($id != null){
            \Cart::remove($id);
        }else {
            \Cart::clear();
        }
        return redirect()->route('cart.show')->with('danger','Remove Item Successful');
    }
    function update(Request $request) {
        $quantity = $request->quantity;
        $cart = \Cart::getContent();
        $i = 0;
        foreach ($cart as $item){
            \Cart::update($item->id,array(
                'quantity' => array(
                    'relative'=>false,
                    'value'=>$quantity[$i]
                ),
            ));
            $i++;
        }
        return redirect()->route('cart.show')->with('danger','Remove Item Successful');
    }
    function delete(Request $request) {
        $cart = \Cart::getContent();
        foreach ($cart as $item){
            $id = $item->id;
            \Cart::remove($id);
        }
        return redirect()->route('cart.show')->with('danger','Remove Item Successful');
    }
    function orderindex (){
        return view('frontend.order');
    }
    function orderdetail(CartStoreRequest $request) {
        $id = Auth::user()->user_id;
        $order = new Order;
        $order->user_id = $id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->status = 1;
        if ($order->save()){
            $orderdetail = new Orderdetail;
            $cart = \Cart::getContent();
            dd($cart);
            $idcart= null;
            $total = Cart::getTotal();
            $cartTotalQuantity = Cart::getTotalQuantity();
            $product = Product::get();
            $idproduct = null;

            foreach ($cart as $item) {
                $idcart = $item->id;
            }
            foreach ($product as $item ){
                if ($item->id == $idcart){
                    dd($idcart);
                }
            }

//                $orderdetail->order_id = $order->id;
//                $orderdetail->product_id = $id;
//                $orderdetail->price = number_format($total);
//                $orderdetail->amount = number_format($cartTotalQuantity);
//                $orderdetail->save();
//                dd($orderdetail);


//            \Cart::clear();
//            return redirect()->route('cart.show')->with('order','Your order has been successfully placed!');
        }
//        return redirect()->route('cart.show')->with('ordererror','Unsuccessful friends');
    }

}
