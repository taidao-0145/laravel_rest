<?php

use Illuminate\Support\Facades\Request;

interface PostRepositoryInterface{
    public function getAllPost();
    public function getPostById($postId);
    public function getPublishedPosts();
    public function createPost(Request $request);
    public function updatePost($postId, Request $request);
    public function deletePost($postId);
}
