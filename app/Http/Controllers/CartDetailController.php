<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        $cartDetailt = new CartDetail();
        $cartDetailt->cart_id = auth()->user()->cart->id;
        $cartDetailt->product_id = $request->product_id;
        $cartDetailt->quantity = $request->quantity;
        $cartDetailt->save();

        $notifications = 'El producto se ha agregado al carrito de compras correctamente.';
        return back()->with(compact('notifications'));
    }

    public function destroy(Request $request)
    {
        $cartDetailt = CartDetail::find($request->cart_detail_id);
        if ($cartDetailt->cart_id = auth()->user()->cart->id) 
            $cartDetailt->delete();

        $notifications = 'El producto del carrito de compras se ha eliminado correctamente.';
        return back()->with(compact('notifications'));
    }
}
