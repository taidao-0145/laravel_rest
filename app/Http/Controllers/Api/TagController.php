<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $tag = Tag::all();

        if ($tag->count() > 0) {
            $data = [
                'status' => 200,
                'students' => $tag
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 400,
                'mess' => "not student"
            ];

            return response()->json($data, 400);
        }
    }

    public function store(Request $request){
        $post = Post::find(2);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else{
            $tag = Tag::create([
                'name' => $request->name,
                'description' => $request->description,
                'post_id'=> $post->id,
            ]);

            if ($tag) {
                return response()->json([
                    'status' => 200,
                    'message' => "Tag create successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong!"
                ], 500);
            }

        }
    }
    public function getTagPost($id){
        $post = Post::find($id);
        $tag =  $post -> tag;
        if ($tag->count()>0){
            $data = [
                'status' => 200,
                'tag' => $tag
            ];
            return response()->json($data, 200);
        }
        else{
            $data = [
                'status' => 200,
                'mess' => "not tag"
            ];
            return response()->json($data, 400);
        }


    }
}
