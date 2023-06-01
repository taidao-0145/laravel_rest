<?php

namespace App\Services;

use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PostService
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this -> postRepository = $postRepository;
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'body' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "kiem tra data",
                'data' => $validator->messages()
            ];
            return response()->json($response, 400);
        } else {
            $posts = $this->postRepository->create($input);
            if ($posts) {
                $response = [
                    'success' => true,
                    'message' => "thanh cong",
                    'data' => new PostResource($posts)
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => "loi roi",
                ];
            }
            return $response;
        }
    }
}

