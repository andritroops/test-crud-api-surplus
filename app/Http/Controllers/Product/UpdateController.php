<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name,' . $id,
            'description' => 'required',
            'enable' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {

            $product =  Product::find($id);

            if(!$product){
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Product not found!',
                ], 422);
            }

            Product::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'enable' => $request->enable,
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Update data successfully!',
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
