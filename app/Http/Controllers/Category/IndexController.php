<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {

        $categories = Category::latest()->paginate(20);

        return response()->json([
            'status' => 'success',
            'categories' => $categories,
        ]);
    }

}
