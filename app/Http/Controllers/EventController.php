<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Session;
use App\Post;
use App\User;
use App\ImageUpload;
use App\Event;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class EventController extends Controller
{
    public function viewEvent()
    {
        return view('admin.addEvent');
    }

    public function addEvent(Request $request)
    {
        if ($request->hasFile('image')) {
            $event = new Event;

            $eventTitle = $request->eventTitle;
            $eventDate = $request->eventDate;
            $eventDescription = $request->eventDescription;

                $image = $request->file('image');

                $filename    = time().'-'.$image->getClientOriginalName();
                $path = public_path('images/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300)->save($path);


            //echo $imageName;

            $event->event_title = $eventTitle;
            $event->event_date = $eventDate;
            $event->event_description = $eventDescription;
            $event->image = $filename;

            $event->save();

            return back()->with('message','Event successfully Added.');
        } else {
            $event = new Event;

            $eventTitle = $request->eventTitle;
            $eventDate = $request->eventDate;
            $eventDescription = $request->eventDescription;


            $event->event_title = $eventTitle;
            $event->event_date = $eventDate;
            $event->event_description = $eventDescription;
            $event->save();

            return back()->with('message','Event successfully Added.');
        }
        
       //return $request->all();
       

    }


    public function adminViewEvent()
    {
        $events = Event::orderBy('id', 'DESC')->paginate(6);
        //echo $value = str_limit('$post->post_description', 7);
        //dd($posts);
        return view('admin.adminViewEvent')->with('events',$events);

    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        $image=$event->image;
        if($image!=null){
            $path = base_path() . "/images/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        if ($event) {
            $event->delete();
            return Redirect::back()->with('message', 'Event Delete Successfully....!!!');
        } else {
            return Redirect::back()->with('message', 'Event not found');
        }

    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        //dd($post);
        return view('admin.editEvent', compact('event'));

    }

    public function updateEvent(Request $request,$id)
    {
        if ($request->hasFile('image')) {
            $event = Event::find($id);
            //unlink existing file
            $image=$event->image;
            if($image!=null){
                $path = base_path() . "/images/" . $image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            
            $eventTitle = $request->eventTitle;
            $eventDate = $request->eventDate;
            $eventDescription = $request->eventDescription;

            $image = $request->file('image');

            $filename    = time().'-'.$image->getClientOriginalName();
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(300, 300)->save($path);



            //echo $imageName;

            $event->event_title = $eventTitle;
            $event->event_date = $eventDate;
            $event->event_description = $eventDescription;
            $event->image = $filename;

            $event->save();

            return Redirect::back()->with('message', 'Event Successfully Updated');
        } else {
            $event = Event::find($id);
            $event->event_title = $request->eventTitle;
            $event->event_date = $request->eventDate;
            $event->event_description = $request->eventDescription;
            $event->save();

            return Redirect::back()->with('message', 'Event Successfully Updated');
        }
        
    }
}
