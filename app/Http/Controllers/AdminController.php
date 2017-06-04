<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class AdminController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('admin');
    }

    public function index()
    {
    	$blogs = Blog::all();
    	return view('admin.index', compact('blogs'));
    }
}
