<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class IndexController extends Controller
{
    public function __invoke()
    {

        $productImage = ProductImage::with('product','image')->latest()->paginate(20);

        return response()->json([
            'status' => 'success',
            'productImage' => $productImage,
        ]);
    }
}
