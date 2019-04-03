<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Mail;

class SendEmailController extends Controller
{
    public function contuct()
    {
        return view('contuct');
    }

    public function sendmail(Request $request)
    {
    
        $name = $request->name;
        $subject = $request->subject;
        $email = $request->email;
        
        $data = array(
            'name' => $request->name, 
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message,
            'date' => date('l jS \of F Y h:i A')
        );
        
        Mail::send('emailTemplate', $data, function ($message) use ($email,$name,$subject) {
            $message->to('info@rydobd.com', 'admin')
            ->subject($subject);
            
            $message->from($email, $name);
            
        });

        return back()->with('message', 'Thank for contuct With us');
    }
}
