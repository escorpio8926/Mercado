<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class testcontroler extends Controller
{
    public function welcome()
    {

    $products = Product::paginate(9);
    return view ('welcome')->with(compact('products'));
    }
}
