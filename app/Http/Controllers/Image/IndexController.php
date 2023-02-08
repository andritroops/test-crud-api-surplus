<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class IndexController extends Controller
{
    public function __invoke()
    {

        $images = Image::latest()->paginate(20);

        return response()->json([
            'status' => 'success',
            'images' => $images,
        ]);
    }
}
