<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $totalItem = 0;
    public $totalCode = 0;
    public $Code = 0;


    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
        $this->totalItem = $this->getTotalItem();
        $this->totalCode= $this->getTotalCode();
        $this->Code= $this->getCode();
    }

    public function setItem($pro){
        if(isset($this->items[$pro->id])){
            $this->items[$pro->id]['quantity'] += 1;
        }else{
            $item = [
                'id'=>$pro->id,
                'name'=>$pro->name,
                'image'=>$pro->image,
                'price'=>$pro->sale_price > 0 ? $pro->sale_price : $pro->price,
                'quantity'=> 1
            ];
            $this->items[$pro->id] = $item;
            
        }

        session(['cart'=>$this->items]);
    }

    public function removeItem($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
            session(['cart'=>$this->items]);
        }
    }

    public function updateItem($id,$quantity){
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity > 0 ? ceil($quantity) : 1;
            session(['cart'=>$this->items]);
        }
    }

    public function clearItem(){
        session()->forget('cart');
    }

    public function getTotalPrice(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    public function getCode(){
        $total = 0;
        $subtotal = $this->getTotalPrice();
        $total = ($subtotal * 5) / 100 ;
        return $total;
    }

    public function getTotalCode(){
        $total = 0;
        $subtotal = $this->getTotalPrice();
        $code = $this->getCode();
        $total = $subtotal - $code;
        return $total;
    }

    public function getTotalQuantity(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item['quantity'];
        }
        return $total;
    }

    public function getTotalItem(){
        $total = 0;
        $total = count($this->items);
        return $total;
    }

}
