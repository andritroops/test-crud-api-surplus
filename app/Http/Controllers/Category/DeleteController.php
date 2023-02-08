<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke($id){

        DB::beginTransaction();

        try {

            $category = Category::find($id);
            
            if($category){
                $category->delete();
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Category not found!',
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
