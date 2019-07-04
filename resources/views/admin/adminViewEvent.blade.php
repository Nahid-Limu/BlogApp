@extends('layouts.appAdmin') 
@section('title', 'All Event')
@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">All Events</li>
</ol>
<div class="container">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
       <h3 class="text-center text-white bg-primary">All Events</h3>
      <div class="row">
          @foreach ($events as $event)
          <div class="col-lg-6">
            <div class="row ">
              <div class="col-md-4">
                  <div >
                      <a href="" ><img class="card-img-top" src=" {{ asset('images').'/'.$event->image }} " alt="no image found" style="width: 150px; height: 200px;"></a>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h4 class="card-title">
                        <a href="" style="text-decoration:none;">{{ $event->event_title }}</a>
                      </h4>
    
                      <h6>By Admin ,<small>Publish Date: {{$event->created_at->toDateString()}}</small></h6>
    
                      <h5>{{ str_limit($event->event_description, 100) }}</h5>
                      
                      <div>
                        <a href="{{ route('editEvent', $event->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('deleteEvent', $event->id)}}" onclick="return confirm('are you sure to Delete?')" class="btn btn-sm btn-danger">Delete</a>
                      </div>
                    </div>
              </div>
            </div>
              
          </div>
          @endforeach
    
      </div>
    
      <div class="d-flex justify-content-center">
          {{ $events->links() }}
      </div>
    
    </div>
@endsection

@section('script')
    <script>
            //text eiditior
            //tinymce.init({selector: 'textarea'});

            //flash msg
            $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                $("#successMessage").alert('close');
            });
    </script>
@endsection
