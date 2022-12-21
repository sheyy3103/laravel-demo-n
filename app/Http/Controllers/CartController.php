<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Requests\Quantity\QuantityRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(QuantityRequest $request, $id, Cart $cart)
    {
        // dd($request->validated());
        $request->validated();
        $product = Product::find($id);
        $cart->add($product, $request->quantity);
        return redirect()->route('cart')->with('success','Purchased successfully');
    }
    public function cart(Cart $cart)
    {
        $total = $cart->getTotal();
        $data = $cart->show();
        $product = Product::all();
        return view('client.cart',compact('data','product','total'));
    }
    public function update($id,QuantityRequest $request, Cart $cart)
    {
        $request->validated();
        $cart->update($id,$request->quantity);
        return redirect()->back()->with('success','Updated quantity successfully');
    }
    public function detele(Cart $cart,$id)
    {
        $cart->detele($id);
        return redirect()->back()->with('success','Deteled item successfully');
    }
}
