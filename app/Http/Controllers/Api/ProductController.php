<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'price'=>'required'
        ]);
        if($validator->fails()){
            $arr = [
                'success'=>false,
                'message'=>'loi roi',
                'data' => $validator->errors()
            ];
            return response()->json($arr,200);
        }
        $product = Product::create($input);
        if($product){
            return response()->json([
                'success' => true,
                'message' => "them thanh cong",
                'data' => new ProductResource($product)
            ], 200);
        }
        else{
            return response()->json([
                'success' => 500,
                'message' => "dell them dc"
            ], 500);
        }
    }
    public function index(){
        $product = Product::all();
        return response()->json([
            'success'=> true,
            'data' => ProductResource::collection($product)
        ]);
    }
}
