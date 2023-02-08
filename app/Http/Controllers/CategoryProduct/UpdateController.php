<?php

namespace App\Http\Controllers\CategoryProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryProduct;
use Illuminate\Validation\Rule;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => [
                'required',
                Rule::unique('category_products')->where('product_id', $request->product_id)->where('category_id', $request->category_id)->whereNot('id',$id)
            ],
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {

            $categoryProduct =  CategoryProduct::find($id);

            if(!$categoryProduct){
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Category not found!',
                ], 422);
            }

            $categoryProduct->update([
                'product_id' => $request->product_id,
                'category_id' => $request->category_id,
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
