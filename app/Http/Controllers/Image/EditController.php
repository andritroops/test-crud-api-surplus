<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class EditController extends Controller
{
    public function __invoke($id)
    {

        $image = Image::find($id);

        return response()->json([
            'status' => 'success',
            'image' => $image,
        ]);
    }
}
