<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function viewDashboard()
    {
        $totalpost = Post::count();
        $totalImage = ImageUpload::count();
        //dd($post);
        return view('admin.dashboard', compact('totalpost', 'totalImage'));
    }

    public function viewPost()
    {
        return view('admin.post');
    }

    public function imageGallery()
    {
        return view('admin.imageGallery');
    }



    public function login_check(Request $request)
    {
        $user = User::where('email', $request->email)
        ->where('password', $request->password)
        ->first();
        if ($user) {
            Session::put('userId',$user->id);
            Session::put('userName',$user->name);
            //echo Session::get('userId');
            return Redirect::route('dashboard');
        } else {
            return Redirect::back()->with('message', 'Email or Password Wrong....!!!');
        }
        
        //return $request->all();
    }   

    public function logout()
    {
        Session::flush();
        return Redirect::route('home');
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

        $filename =  ($image->getClientOriginalName());

        $path = public_path('images/' . $filename);

        Image::make($image->getRealPath())->resize(300, 300)->save($path);



       //echo $imageName;

       $post->post_title = $postTitle;
       $post->post_description = $postDescription;
       $post->image = $filename;

       $post->save();

       return back()->with('message','Post Add successfully.');



    }


    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = new ImageUpload();
        $imageUpload->image = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        ImageUpload::where('image',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
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


    public function adminViewGallery()
    {
        $gallery = ImageUpload::orderBy('id', 'DESC')->paginate(6);
        //echo $value = str_limit('$post->post_description', 7);
        //dd($posts);
        return view('admin.editGallery')->with('gallery',$gallery);
    
    }


    public function deleteGalleryImage($id)
    {
        $gallery = ImageUpload::find($id);
        if ($gallery) {
            $gallery->delete();
            return Redirect::back()->with('message', 'Post Delete Successfully....!!!');
        } else {
            return Redirect::back()->with('message', 'Post not found');
        }
        
    }

    
}
