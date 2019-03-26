<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\ImageUpload;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);

        return view('home')->with('posts',$posts);
    }

    public function imageGallery()
    {
        $gallery = ImageUpload::orderBy('id', 'DESC')->paginate(9);

       return view('imageGallery', compact('gallery'));
    }
    

    public function viewPost($id)
    {
        $post = Post::find($id);

        return view('viewPost')->with('post', $post);
    }

    public function contuct()
    {
        return view('contuct');
    }

    public function about()
    {
        return view('about');
    }




    public function test()
    {
        
        return view('test');
    }



    //api
    public function index()
    {
        $posts = Post::all();
        //return $posts;
        return response()->json($posts);
    }
    public function insert(Request $request)
    {
        echo $request->title;
        //print_r($request->input('post'));

        $post = new Post;
        $post->post_title = $request->input('title');
        $post->post_description = $request->input('post');
        $post->image = $request->input('image');

        $post->save();
        return "post saved";
    }

    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $post->post_title = $request->input('title');
        $post->post_description = $request->input('post');
        $post->image = $request->input('image');

        $post->save();
        return "post update";
    }

    public function delete(Request $request, $id)
    {

        $post = Post::find($id);



        $post->delete();
        return "post delete";
    }
}
