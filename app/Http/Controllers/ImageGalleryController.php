<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ImageGalleryController extends Controller
{
    public function imageGallery()
    {
        return view('admin.imageGallery');
    }
    
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(base_path('images'),$imageName);
        
        $imageUpload = new ImageUpload();
        $imageUpload->image = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        ImageUpload::where('image',$filename)->delete();
        $path=base_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
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
            $image_path = base_path().'/images/'.$gallery->image;
            unlink($image_path);
            $gallery->delete();
            return Redirect::back()->with('message', 'Post Delete Successfully....!!!');
        } else {
            return Redirect::back()->with('message', 'Post not found');
        }
        
    }
}
