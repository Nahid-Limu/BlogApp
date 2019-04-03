<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use Auth;
use Image;

class PostController extends Controller
{
    public function viewPost()
    {
        return view('admin.addPost');
    }

    public function addPost(Request $request)
    {
       //return $request->all();
       $post = new Post;

       $postTitle = $request->postTitle;
       $postDescription = $request->postDescription;

        //$imageName = time().'.'.request()->image->getClientOriginalExtension();
        //    $imageName = time().'-'.request()->image->getClientOriginalName();
        //    request()->image->move(public_path('images'), $imageName);


        // $image       = $request->file('image');
        // $filename    = time().'-'.$image->getClientOriginalName();

        // $image_resize = Image::make($image->getRealPath());              
        // $image_resize->resize(300, 300);
        // $image_resize->save(public_path('images/' .$filename));


        $image = $request->file('image');
        $filename    = time().'-'.$image->getClientOriginalName();
        $path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(600, 600)->save($path);



       //echo $imageName;

       $post->post_title = $postTitle;
       $post->post_description = $postDescription;
       $post->image = $filename;

       $post->save();

       return back()->with('message','Post Add successfully.');
       
    }


    public function adminViewPost()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);
        //echo $value = str_limit('$post->post_description', 7);
        //dd($posts);
        return view('admin.adminViewPost')->with('posts',$posts);
    
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            $image_path = public_path().'/images/'.$post->image;
            unlink($image_path);
            $post->delete();
            return Redirect::back()->with('message', 'Post Delete Successfully....!!!');
        } else {
            return Redirect::back()->with('message', 'Post not found');
        }
        
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        //dd($post);
        return view('admin.editPost', compact('post'));
        
    }

    public function updatePost(Request $request,$id)
    {
        $post = Post::find($id);
        $post->post_title = $request->postTitle;
        $post->post_description = $request->postDescription;
        $post->save();

        return Redirect::back()->with('message', 'Post Update Successfully');
    }
}
