<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

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
       $categories = Category::pluck('name', 'id');
        return view('blog.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $blog =  Blog::create($input);
        if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }
        return redirect('blog');
    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }


    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input); 
        if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }
        return redirect('/blog');
    }


    public function destroy(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $categoryIds = $request->category_id;
        $blog->category()->detach($categoryIds);
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
