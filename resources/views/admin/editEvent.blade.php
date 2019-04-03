@if (Session::has('userId'))

@extends('layouts.appAdmin')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Event</li>
</ol>
<div class="">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif

    <div class="card card-6 border-info">
        <div class="card-heading bg-info">
            <h2 class="title">Update Event</h2>
        </div>
        <form action=" {{ route('updateEvent', $event->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            
                <div class="form-row">
                    <div class="name">Post Title</div>
                    <div class="value">
                        <input class="input--style-6" type="text" name="eventTitle" value="{{$event->event_title}}" required>
                    </div>
                </div>
                <div class="form-row">
                        <div class="name">Event Date</div>
                        <div class="value">
                            <input class="input--style-6" type="date" name="eventDate" value="{{$event->event_date}}" required>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="name">Post Description</div>
                    <div class="value">
                        <div class="input-group">
                            <textarea class="textarea--style-6" name="eventDescription" placeholder="">{{$event->event_description}}</textarea>
                        </div>
                    </div>
                </div>

            
        </div>
        <div class="card-footer">
            <button class="btn btn--radius-2 btn--blue-2" type="submit"><i class="fa fa-refresh"></i> Update Event</button>
        </div>
        </form>
    </div>

</div>
@include('includes.footer')
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

@else
<script>window.location = "/admin";</script>
@endif