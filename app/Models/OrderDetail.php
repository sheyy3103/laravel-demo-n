<?php

namespace App\Models;

use App\Helpers\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'price', 'quantity', 'total'];
    public function createOrderDetails($order_id)
    {
        $cart = new Cart();
        foreach ($cart->show() as $item) {
            $data = [
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['price'] * $item['quantity'],
            ];
            OrderDetail::create($data);
            $cart->detele($item['product_id']);
        }
    }
}
