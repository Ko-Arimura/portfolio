<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Like;
use App\Models\Product;
use Cloudinary; 
use App\Models\Category;

class PostController extends Controller
{
    public function index(Request $request) {
        $user_id = Auth::id();
        $keyword = $request->input('keyword');

        $query = Post::query();
        
        if(!empty($keyword)) {
          
            $query = Post::where('text', 'LIKE', "%{$keyword}%")
                  ->orWhereHas('product', function ($query) use ($keyword) {
                $query->where('flavor', 'like', "%{$keyword}%")
                ->orwhere('name', 'like', "%{$keyword}%");
            });
        }
        

       	$posts = $query->orderBy('updated_at', 'DESC')->paginate(2);
        return view('posts.index', compact('keyword','posts' , 'user_id'));
    }
    
    public function create(Category $category , Product $product , Post $post)
    {
        return view('posts.create')->with(['categories' => $category->get() ,'products' =>$product->get()]);
    }
    
        public function edit(Post $post , Category $category )
    {
        return view('posts.edit')->with(['categories' => $category->get() ,  'post' => $post]);
    }
    
    public function show(Post $post) {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function delete(Post $post )
    {
    $post->delete();
    return redirect('/');

    }
    public function store(Post $post, Product $product, PostRequest $request) {
        $input = $request['post'];
        $product->name =$input["name"];
        $product->category_id =$input["category_id"];
        $product->flavor =$input["flavor"];
        $product->save();


        $post->text = $input["text"];
        $post->user_id = Auth::id();
        if(!empty($post->image_url)){
        $post->image_url =Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }
        $post->product_id =$product->id;
        $post->review =$input["review"];
        $post->price = $input["price"];
        $post->save();
        

        
        return redirect('/posts/' . $post->id);
    }
    
        public function update(Post $post, Product $product, PostRequest $request) {
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
    
    
    // いいね機能
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            ]);
            session()->flash('success', 'You Liked the Reply.');
            return redirect()->back();
        
    }
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        session()->flash('success', 'You Unliked the Reply.');
        return redirect()->back();
        
    }
}