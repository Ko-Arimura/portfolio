<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Product;
use Cloudinary; 
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post) {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
    }
    
    public function create(Category $category , Product $product)
    {
        return view('posts.create')->with(['categories' => $category->get()] ,['products' =>$product->get()]);
    }
    
    public function show(Post $post) {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function store(Post $post, Product $product, PostRequest $request) {
        $input = $request['post'];
        $product->name =$input["name"];
        $product->category_id =$input["category_id"];
        $product->flavor =$input["flavor"];
        $product->save();


        $post->text = $input["text"];
        $post->user_id = Auth::id();
        $post->image_url =Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $post->product_id =$product->id;
        $post->review =$input["review"];
        $post->price = $input["price"];
        $post->save();
        

        
        return redirect('/posts/' . $post->id);
    }
    
}