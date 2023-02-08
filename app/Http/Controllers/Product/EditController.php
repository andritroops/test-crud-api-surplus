<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::find($id);

        return response()->json([
            'status' => 'success',
            'product' => $product,
        ]);
    }
}
