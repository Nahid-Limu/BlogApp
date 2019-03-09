<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);
        //echo $value = str_limit('$post->post_description', 7);
        //dd($posts);
        return view('home')->with('posts',$posts);
    }

    public function viewPost($id)
    {
        $post = Post::find($id);
        //dd($post);
        return view('viewPost')->with('post', $post);
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
