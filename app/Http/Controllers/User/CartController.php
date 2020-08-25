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
        $product = Product::find($id);
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        if( $product != null ){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart -> AddCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        return view('user.cart.cart',compact('datepicker1','datepicker2'));
    }

    public function deleteItemCart(Request $request,$id){
        $datepicker1 =$request->datepicker1;
        $datepicker2 =$request->datepicker2;
        $productDel = Product::find($id);
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart -> DeleteItemCart($productDel,$id);
        if( $newCart->product != null ){
            $request->session()->put('Cart', $newCart);
        }else{
            $request->session()->forget('Cart');
        }
        return view('user.cart.cart',compact('datepicker1','datepicker2'));
        // dd($newCart->product);
    }
}
