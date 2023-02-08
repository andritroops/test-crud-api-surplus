<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DeleteController extends Controller
{
    public function __invoke($id){

        DB::beginTransaction();

        try {

            $product = Product::find($id);
            
            if($product){
                $product->delete();
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Product not found!',
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
