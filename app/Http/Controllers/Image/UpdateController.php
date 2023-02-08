<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {

        $rules = [
            'name' => 'required|unique:images,name,'.$id,
            'enable' => 'required'
        ];
        
        if($request->file){
            $rules = Arr::add($rules, 'file','mimes:jpg,jpeg,png,webp');
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {

            $image =  Image::find($id);

            if(!$image){
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Data Image found!',
                ], 422);
            }

            $attributes = [
                'name' => $request->name,
                'enable' => $request->enable,
            ];

            if($request->file){
                $path = $request->file('file')->storePublicly('file', 'public');
                $attributes = Arr::add($attributes, 'file', $path);

                Storage::disk('public')->delete($image->file);
            }


            $image->update($attributes);

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
