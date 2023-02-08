<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
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

            Category::create([
                'name' => $request->name,
                'enable' => $request->enable,
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Create data successfully!',
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
