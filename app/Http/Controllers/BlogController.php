<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('home', ["categories" => $categories, "posts" => $posts]);
    }
    
    public function post(Post $post){
        $categories = Category::all();
        $posts = Post::all();
        return view('post',["categories" => $categories,"posts"=>$posts,"post"=>$post]);
    }
    
    public function category($category_id){
        $posts = Post::whereHas('category', function ($query) use ($category_id) {
            $query->where('categories.id', $category_id);
        })->get();
        $categories = Category::all();
        return view('home',["categories" => $categories,"posts"=>$posts,"posts"=>$posts]);
    }
}
