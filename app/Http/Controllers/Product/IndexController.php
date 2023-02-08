<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(){

        $products = Product::latest()->paginate(20);

        return response()->json([
            'status' => 'success',
            'products' => $products,
        ]);

    }
}
