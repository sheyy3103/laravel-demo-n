<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Requests\Quantity\QuantityRequest;
use App\Http\Requests\User\OrderUserRequest;
use App\Mail\OrderShiped;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function add(QuantityRequest $request, $id, Cart $cart)
    {
        // dd($request->validated());
        $request->validated();
        $product = Product::find($id);
        $cart->add($product, $request->quantity);
        return redirect()->route('cart')->with('success', 'Purchased successfully');
    }
    public function cart(Cart $cart)
    {
        $total = $cart->getTotalPrice();
        $totalProduct = $cart->getTotalProduct();
        $data = $cart->show();
        return view('client.cart', compact('data', 'total', 'totalProduct'));
    }
    public function update($id, QuantityRequest $request, Cart $cart)
    {
        $request->validated();
        $cart->update($id, $request->quantity);
        return redirect()->back()->with('success', 'Updated quantity successfully');
    }
    public function detele(Cart $cart, $id)
    {
        $cart->detele($id);
        return redirect()->back()->with('success', 'Deteled item successfully');
    }
    public function checkout(Cart $cart)
    {
        $total = $cart->getTotalPrice();
        $totalProduct = $cart->getTotalProduct();
        $data = $cart->show();
        return view('client.checkout', compact('data', 'total', 'totalProduct'));
    }
    public function order(OrderUserRequest $request, Order $order, OrderDetail $orderDetail)
    {
        $request->validated();
        $ordered = $order->createOrder();
        $orderDetail->createOrderDetails($ordered->id);
        $orderDetails = $orderDetail->where('order_id', $ordered->id)->get();
        Mail::to('kelvinhuynhalves1102@gmail.com')->send(new OrderShiped($orderDetails));
        return redirect()->route('index')->with('success', 'Ordered successfully! Thanks for ordering ~~`');
    }
    public function ordered()
    {
        $order = Order::where('user_id', Auth::user()->id)->paginate(1);
        $orderDetails = [];
        $products = [];
        $totalPrice = 0;
        $totalProduct = 0;
        foreach ($order as $value) {
            $orderDetails[$value->id] = Order::find($value->id)->order_details;
            foreach ($orderDetails[$value->id] as $value) {
                $products[$value['product_id']] = Product::find($value['product_id']);
                $totalProduct += 1;
                $totalPrice += $value['total'];
            }
        }
        return view('client.ordered', compact('order', 'orderDetails', 'products', 'totalPrice', 'totalProduct'));
    }
}
