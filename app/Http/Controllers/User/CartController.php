<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function addCart(Request $request,$id){
        $sessionCart = 'Cart-homestay-'.$request->homestay_id;

        $product = Product::find($id);
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        if( $product != null ){
            $oldCart = Session($sessionCart) ?? null;
            $newCart = new Cart($oldCart);
            $newCart -> AddCart($product, $id);
            $request->session()->put($sessionCart, $newCart);
        }
        return view('user.ajax.cart',compact('sessionCart','datepicker1','datepicker2'));
    }

    public function deleteItemCart(Request $request,$id){
        $sessionCart = 'Cart-homestay-'.$request->homestay_id;
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $productDel = Product::find($id);

        $oldCart = Session($sessionCart) ?? null;
        $newCart = new Cart($oldCart);
        $newCart -> DeleteItemCart($productDel,$id);
        if( $newCart->product != null ){
            $request->session()->put($sessionCart, $newCart);
        }else{
            $request->session()->forget($sessionCart);
        }
        return view('user.ajax.cart',compact('sessionCart','datepicker1','datepicker2'));
    }
}
