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
        return view('user.cart.cart',compact('newCart','datepicker1','datepicker2'));
    }
}
