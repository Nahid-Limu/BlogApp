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
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
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

    
    public function viewDashboard()
    {
        $totalpost = Post::count();
        $totalImage = ImageUpload::count();
        $totalevent = Event::count();
        //dd($totalevent);
        return view('admin.dashboard', compact('totalpost', 'totalImage', 'totalevent'));
    }

    

    
}
