<?php

namespace App\Http\Controllers\CategoryProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class IndexController extends Controller
{
    public function __invoke()
    {

        $categoryProducts = CategoryProduct::with('product','category')->latest()->paginate(20);

        return response()->json([
            'status' => 'success',
            'categoryProducts' => $categoryProducts,
        ]);
    }
}
