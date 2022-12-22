<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','address','phone','status','note'];
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function createOrder()
    {
        $data = [
            'user_id' => Auth::user()->id,
            'name' => request()->name,
            'address' => request()->address,
            'phone' => request()->phone,
            'note' => request()->note
        ];
        $order = Order::create($data);
        return $order;
    }
}
