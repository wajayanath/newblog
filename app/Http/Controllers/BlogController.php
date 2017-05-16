<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index', compact('blogs'));
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Blog::create($input); 
        return back();
    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input); 
        return redirect('/blog');
    }


    public function destroy(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->delete($input); 
        return redirect('/blog/bin');
    }

    public function bin()
    {
        $deletedBlogs = Blog::onlyTrashed()->get();
        return view('blog.bin', compact('deletedBlogs'));
    }

    public function restore($id)
    {
        $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlogs->restore($restoredBlogs);
        return redirect('/blog');
    }

    public function destroyBlog($id)
    {
        $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
        $destroyBlog->forceDelete($destroyBlog);
        return back();
    }
}
