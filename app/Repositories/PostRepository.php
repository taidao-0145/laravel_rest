<?php
namespace App\Repositories;
use App\Models\Post;

class PostRepository {
    protected $post;

    public function __construct(Post $post)
    {
        $this -> post = $post;
    }
    public function create($attributes){

        return $this->post->create($attributes);
    }
}
