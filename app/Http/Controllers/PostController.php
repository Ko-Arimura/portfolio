<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Cloudinary; 

class PostController extends Controller
{
    public function index(Post $post) {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
    }
    
    public function create() {
        return view('posts.create');
    }
    
    public function show(Post $post) {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function store(Post $post, PostRequest $request) {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id]; 
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        }
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}