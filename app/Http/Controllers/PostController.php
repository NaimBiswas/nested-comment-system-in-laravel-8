<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::take(5)->get();
        return view('post.index', compact('post'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {

        $validator = $request->validate([
            'title' => 'required|max:100|min:10',
        ]);
        $post =  new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->save();
        return redirect()->back();
    }
    public function show($slug)
    {

        $post = Post::where('slug', $slug)->first();

        return view('post.single', compact('post'));
    }
}
