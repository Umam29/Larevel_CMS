<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Tags;

class BlogController extends Controller
{
    public function index(Posts $post)
    {
        $category_widget = Category::all();
        $tags = Tags::all();

        $data = $post->latest()->take(8)->get();
        return view('blog', compact('data', 'category_widget', 'tags'));
    }

    public function GetPost($slug)
    {
        $category_widget = Category::all();
        $tags = Tags::all();

        $data = Posts::where('slug', $slug)->get();
        return view('blog.content_post', compact('data', 'category_widget', 'tags'));
    }

    public function ListPost()
    {
        $category_widget = Category::all();
        $tags = Tags::all();

        $data = Posts::latest()->paginate(2);
        return view('blog.list_post', compact('data', 'category_widget', 'tags'));
    }

    public function ListCategory(Category $category)
    {
        $category_widget = Category::all();
        $tags = Tags::all();

        $data = $category->posts()->paginate(2);
        return view('blog.list_post', compact('data', 'category_widget', 'tags'));
    }

    public function search(request $request)
    {
        $category_widget = Category::all();
        $tags = Tags::all();

        $data = Posts::where('title', 'like', '%'. $request->search . '%')->paginate(2);
        return view('blog.list_post', compact('data', 'category_widget', 'tags'));
    }
}
