<?php

namespace App\Interfaces;

interface PostInterface {
    // interface get all postingan
    public function getAllPosts();
    // interface create postingan
    public function createPost($request);
    // interface get data by id
    public function getPostById($postId);
    // interface update data by id
    public function updatePost($request, $postId);
    // interface delete data by id
    public function deletePost($postId);
}