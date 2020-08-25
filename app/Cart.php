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
        if($this->product){
            if( array_key_exists($id, $this->product) == false ){
                $newProduct = ['productInfo' => $product];
                $this->product[$id] = $newProduct;
                $this->totalPrice += $product->prices*(100-$product->discount)/100;
                $this->totalQuanty++;
            }
        }else{
            $newProduct = ['productInfo' => $product];
            $this->product[$id] = $newProduct;
            $this->totalPrice += $product->prices*(100-$product->discount)/100;
            $this->totalQuanty++;
        }
    }

    public function DeleteItemCart($product,$id){
        $this->totalQuanty--;
        $this->totalPrice -= $product->prices*(100-$product->discount)/100;
        unset($this->product[$id]);
    }
}

?>