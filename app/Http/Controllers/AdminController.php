<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use App\Event;
use Auth;
use Validator;
use Hash;
use DB;
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
        $totalevent = Event::count();
        //dd($totalevent);
        return view('admin.dashboard', compact('totalpost', 'totalImage', 'totalevent'));
    }

    //change passsword
    public function change_password(Request $request)
    {
        //return response()->json($request->all());
        $rules = array(
            'current_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        //$old = bcrypt($request->current_password);
        // echo $old.'<br>';
        // echo Auth::user()->password;
        if (Hash::check($request->current_password, Auth::user()->password)) {
            if ($request->new_password == $request->confirm_password) {
            
                $user = DB::table('users')->where('id', Auth::user()->id)
                ->update([
                    'password'=>bcrypt($request->confirm_password),
                ]);
                if ( $user) {
                    return response()->json(['success' => 'Password change successfully !!']);
                    //return redirect()->back()->with('success','Password change successfully !!');
                } else {
                    return response()->json(['falied' => 'Failed !!']);
                    //return redirect()->back()->with('error','Failed !!');
                }
                
            
            } else {
                return response()->json(['falied' => 'Password Not Match !!']);
                //return redirect()->back()->with('error','Password Not Match');
            }
            
            
        }else {
            return response()->json(['falied' => 'Current password is not match !! !!']);
            //return redirect()->back()->with('error','Current password is not match');;
        }
        
    }

    //change photo
    public function update_photo(Request $request){
        $users=DB::table('users')->where('id','=', Auth::user()->id )->first();
        $image=$users->image;
        if($image!=null){
            $path = public_path() . "/img/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        if($file=$request->file('image')){
            if($request->file('image')->getClientSize()>2000000)
            {
                
                return response()->json(['error' => 'Could Not Upload. File Size Limit Exceeded.']);
            }
            $name='profilePhoto'.'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('img',$name);
            DB::table('users')->where('id','=',Auth::user()->id)
            ->update([
                'image'=>$name,
            ]);
        }
        
        return response()->json(['success' => 'Image Updated.']);
    }

    
}
