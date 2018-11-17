<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->save();

        $notifications = 'Tu pedido ha sido notificado correctamente. Te contactaremos por via Mail';
        return back()->with(compact('notifications'));
    }
}
