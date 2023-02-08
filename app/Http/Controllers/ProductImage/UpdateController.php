<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductImage;
use Illuminate\Validation\Rule;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => [
                'required',
                Rule::unique('product_images')->where('product_id', $request->product_id)->where('image_id', $request->image_id)->whereNot('id',$id)
            ],
            'image_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {

            $productImage =  ProductImage::find($id);

            if(!$productImage){
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Product Image not found!',
                ], 422);
            }

            $productImage->update([
                'product_id' => $request->product_id,
                'image_id' => $request->image_id,
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
