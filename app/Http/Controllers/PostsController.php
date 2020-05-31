<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use Illuminate\Support\Str;
use App\Tags;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $img = $request->image;
        $new_img = time().$img->getClientOriginalName();

        $post = Posts::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => 'public/upload/posts/'.$new_img,
            'slug' => Str::slug($request->title),
            'users_id' => Auth::id()
        ]);

        $img->move('public/upload/posts/', $new_img);

        $post->tags()->attach($request->tags);

        return redirect()->back()->with('success', 'Post data successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        $category = Category::all();
        return view('admin.post.edit', compact('post', 'tags', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Posts::findorfail($id);

        if($request->has('image')) {
            $img = $request->image;
            $new_img = time().$img->getClientOriginalName();
            $img->move('public/upload/posts/', $new_img);
            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'image' => 'public/upload/posts/'.$new_img,
                'slug' => Str::slug($request->title)
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->title)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('posts.index')->with('success', 'Post data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post data successfully remove to trash');
    }

    public function showTrash()
    {
        $trash = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.trash', compact('trash'));
    }

    public function restore($id)
    {
        $trash = Posts::withTrashed()->where('id', $id)->first();
        $trash->restore();

        return redirect()->back()->with('success', 'Post data successfully restore');
    }

    public function kill($id)
    {
        $trash = Posts::withTrashed()->where('id', $id)->first();
        $trash->forceDelete();

        return redirect()->back()->with('success', 'Post data successfully deleted');
    }
}
