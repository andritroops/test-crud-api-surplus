<?php

namespace App\Http\Controllers\CategoryProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class EditController extends Controller
{

    public function __invoke($id)
    {

        $categoryProduct = CategoryProduct::find($id);

        return response()->json([
            'status' => 'success',
            'categoryProduct' => $categoryProduct,
        ]);
    }
}
