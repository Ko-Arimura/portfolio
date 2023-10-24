<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class CategoryController extends Controller
{
    
    public function index(Category $category, Post $post)
    {
        // dd($category);
        // dd($category->getByCategory());
        // return view('categories.index')->with(['posts' => $category->getByCategory()]);
        $query = Post::whereHas('product', function ($q) use ($category){
        $q->where('category_id', $category->id);
        });
        // $query = Post::whereHas('product', function ($q) {
        // $q->where('category_id', 2);
        // });
         $posts = $query->get();
        // dd($posts);
         return view('categories.index')->with(['category' => $category , 'posts' => $posts]);
    }
}
