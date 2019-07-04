<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Event;
use App\ImageUpload;
use DB;
class UserViewController extends Controller
{
    
    public function home()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);
        $moto = DB::table('mototext')->first();

        return view('userView')->with('posts',$posts)->with('moto',$moto);
    }


    public function event()
    {
        $events = Event::orderBy('id', 'DESC')->paginate(12);

        return view('UpComingEvent')->with('events',$events);
    }



    public function imageGallery()
    {
        $gallery = ImageUpload::orderBy('id', 'DESC')->paginate(12);

       return view('imageGallery', compact('gallery'));
    }
    

    public function viewPost($id)
    {
        $post = Post::find($id);
        $recent_post = Post::orderBy('id', 'desc')->take(5)->get(['id','post_title','image','created_at']);
        //dd($recent_post);
        return view('viewPost',compact('post','recent_post'));
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
