<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;


class AdminController extends Controller
{
    public function viewPost()
    {
        return view('admin.post');
    }

    public function viewDashboard()
    {
        return view('admin.dashboard');
    }

    public function addPost(Request $request)
    {
       //return $request->all();
       $post = new Post;

       $postTitle = $request->postTitle;
       $postDescription = $request->postDescription;

       //$imageName = time().'.'.request()->image->getClientOriginalExtension();
       $imageName = time().'-'.request()->image->getClientOriginalName();
       request()->image->move(public_path('images'), $imageName);
       //echo $imageName;

       $post->post_title = $postTitle;
       $post->post_description = $postDescription;
       $post->image = $imageName;

       $post->save();

       return back()->with('message','Post Add successfully.');



    }
}
