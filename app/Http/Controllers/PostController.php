<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use Auth;
use Intervention\Image\Facades\Image as Image;
use DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function viewPost()
    {
        return view('admin.addPost');
    }

    public function addPost(Request $request)
    {
       //return $request->all();
       if ($request->hasFile('image')) {
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

                // $imageName = $image->getClientOriginalName();
                // $image->move(public_path('images'),$imageName);


            //echo $imageName;

            $post->post_title = $postTitle;
            $post->post_description = $postDescription;
            $post->image = $filename;

            $post->save();
            return back()->with('message','Post has been successfully added.');
       } else {
           $post = new Post;

            $postTitle = $request->postTitle;
            $postDescription = $request->postDescription;

            $post->post_title = $postTitle;
            $post->post_description = $postDescription;

            $post->save();
            return back()->with('message','Post has been successfully added.');
       }

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
        $image=$post->image;
        if($image!=null){
            $path = public_path() . "/images/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
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
        if ($request->hasFile('image')) {
            //unlink existing file
            $post =Post::find($id);
            $image=$post->image;
            if($image!=null){
                $path = base_path() . "/images/" . $image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
           
            //$post = Post::find($id);
            $postTitle = $request->postTitle;
            $postDescription = $request->postDescription;
            $image = $request->file('image');

            $filename    = time().'-'.$image->getClientOriginalName();
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600)->save($path);

            // $imageName = $image->getClientOriginalName();
            // $image->move(public_path('images'),$imageName);


            //echo $imageName;

            $post->post_title = $postTitle;
            $post->post_description = $postDescription;
            $post->image = $filename;

            $post->save();
            return back()->with('message','Post has been successfully updated.');
       } else {
            $post = Post::find($id);
            $post->post_title = $request->postTitle;
            $post->post_description = $request->postDescription;
            $post->save();

            return back()->with('message','Post has been successfully updated.');
       }
        
    }

    //Moto
    public function viewMoto()
    {
        $moto = DB::table('mototext')->first();
        return view('admin.addMoto', compact('moto'));
    }

    public function addMoto(Request $request)
    {
        //$moto = DB::table('mototext')->first();
        $moto = DB::table('mototext')
            ->updateOrInsert(
                ['id' => $request->id],//this use as where
                [
                    'moto' => $request->addmoto,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ]
            );

        return Redirect::back()->with('message', 'Moto Update Successfully');
    }
}
