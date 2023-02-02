<?php

namespace App\Http\Controllers;

use App\Interfaces\PostInterface;
use Illuminate\Http\Request;

class PostController extends Controller {
    private $postInterface;

    public function __construct(PostInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function index() {
        $posts = $this->postInterface->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        try {
            $post = $this->postInterface->createPost($request);
            if ($post) {
                return redirect()->route('posts.index')->with('success', 'post added successfully');
            } else {
                return back()->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $post = $this->postInterface->getPostById($id);
            if ($post) {
                $isView = true;
                return view('posts.create', compact('post', 'isView'));
            } else {
                return redirect('posts.index')->with('failed', 'Failed! no post found');
            }
        } catch (Exception $e) {
            return redirect('posts.index')->with('failed', $e->getMessage());
        }
    }

    public function edit($id) {
        try {
            $post = $this->postInterface->getPostById($id);
            if ($post) {
                $isEdit = true;
                return view('posts.create', compact('post', 'isEdit'));
            } else {
                return redirect('posts.index')->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return redirect('posts.index')->with('failed', $e->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $post = $this->postInterface->updatePost($request, $id);
            if ($post) {
                return redirect()->route('posts.index')->with('success', 'successsss');
            } else {
                return back()->with('failed', 'failedddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $post = $this->postInterface->deletePost($id);
            if ($post) {
                return redirect()->route('posts.index')->with('success', 'suceeeessssssss');
            } else {
                return back()->with('failed', 'failedddddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

}