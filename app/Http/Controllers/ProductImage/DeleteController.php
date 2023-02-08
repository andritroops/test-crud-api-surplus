<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;

class DeleteController extends Controller
{
    public function __invoke($id){

        DB::beginTransaction();

        try {

            $productImage = ProductImage::find($id);
            
            if($productImage){
                $productImage->delete();
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Product Image not found!',
                ], 422);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Delete data successfully!',
            ], 200);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => 'fail',
                'errors' => 'Something Went Wrong!',
            ], 422);
        }

    }
}
