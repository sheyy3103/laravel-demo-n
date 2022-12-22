<?php
namespace App\Helpers;

use App\Models\Product;

class Cart
{
    private $items = [];
    private $totalPrice = 0;
    private $totalQuantity = 0;
    private $totalProduct = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }
    public function add($product, $quantity = 1)
    {
        $item = [
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        }else{
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }
    public function update($id,$quantity)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }
    public function detele($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    public function show()
    {
        return $this->items;
    }
    public function getTotalPrice(){
        foreach ($this->items as $key => $value) {
            $this->totalPrice += $this->items[$key]['price'] * $this->items[$key]['quantity'];
        }
        return $this->totalPrice;
    }
    public function getTotalQuantity()
    {
        foreach ($this->items as $key => $value) {
            $this->totalQuantity += $value['quantity'];
        }
        return $this->totalQuantity;
    }
    public function getTotalProduct()
    {
        foreach ($this->items as $key => $value) {
            $this->totalProduct += 1;
        }
        return $this->totalProduct;
    }
}
