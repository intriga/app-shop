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

        return back();
    }

    public function destroy(Request $request)
    {
        $cartDetailt = CartDetail::find($request->cart_detail_id);
        if ($cartDetailt->cart_id = auth()->user()->cart->id) 
            $cartDetailt->delete();

        return back();
    }
}
