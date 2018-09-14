<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
      $cart=auth()->user()->cart;
        $cart->status='Pending';
          $cart->save();

          $notification="tu pedido se registro , te contactaremos pronto";
          return back()->with(compact('notification'));



    }
}
