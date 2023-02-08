<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class EditController extends Controller
{
    public function __invoke($id)
    {

        $productImage = ProductImage::find($id);

        return response()->json([
            'status' => 'success',
            'productImage' => $productImage,
        ]);
    }
}
