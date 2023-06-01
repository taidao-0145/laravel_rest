<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected $postservice;

    public function __construct(PostService $postservice)
    {
        $this->postservice = $postservice;
    }
    public function index()
    {
        $posts = Post::all();
        $response = [
            'success' => true,
            'message' => $posts,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $response = $this->postservice->create($request);
        return response()->json($response, 200);
    }

    public function getPostTag(){
        $tag = Tag::find(1);
        $post =  $tag -> post;
        return response()->json($post, 200);
    }
}
