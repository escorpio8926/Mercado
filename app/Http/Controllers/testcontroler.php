<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroler extends Controller
{
    public function welcome()
    {
    return view ('welcome');
    }
}
