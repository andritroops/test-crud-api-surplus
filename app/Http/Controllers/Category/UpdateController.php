<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $id,
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

            Category::where('id', $id)->update([
                'name' => $request->name,
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
