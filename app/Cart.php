<?php
namespace App;
class Cart{
    public $product = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;
    
    public function __construct($cart){
        if($cart){
            $this->product = $cart->product;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product,$id){
        $newProduct = [ 'quanty'=>'1' ,'productInfo' => $product];
        $this->product[$id] = $newProduct;
        $this->totalPrice += $product->prices*(100-$product->discount)/100;
        $this->totalQuanty++;
    }
}

?>