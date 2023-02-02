<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface {

    public function getAllPosts() {
        return Post::all();
    }

    public function createPost($request) {
        return Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    }

    public function getPostById($id) {
        return Post::find($id);
    }

    public function updatePost($request, $id) {
        $post = Post::find($id);
        if ($post) {
            $post['title'] = $request->title;
            $post['content'] = $request->content;
            $post->save();
            return $post;
        }
    }

    public function deletePost($id) {
        $post = Post::find($id);
        if ($post) {
            return $post->delete();
        }
    }
}