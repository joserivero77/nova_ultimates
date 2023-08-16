<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){     ///PARA MOSTRAR PRODUCTOS
        $productos=Product::all();
        return view('/index', compact('productos'));
    }

}
