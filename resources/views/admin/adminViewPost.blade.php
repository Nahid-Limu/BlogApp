@if (Session::has('userId'))

@extends('layouts.appAdmin') 
@section('content')

<div class="container">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
       <h3 class="text-center text-warning bg-primary">All Post</h3>
      <div class="row">
          @foreach ($posts as $post)
          <div class="col-lg-6">
            <div class="row ">
              <div class="col-md-4">
                  <div >
                      <a href="{{ route('viewPost', $post->id) }}" ><img class="card-img-top" src=" {{ asset('images').'/'.$post->image }} " alt="no image found" style="width: 150px; height: 200px;"></a>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h4 class="card-title">
                        <a href="{{ route('viewPost', $post->id) }}" style="text-decoration:none;">{{ $post->post_title }}</a>
                      </h4>
    
                      <h6>By Admin ,<small>Publish Date: {{$post->created_at->toDateString()}}</small></h6>
    
                      <h5>{{ str_limit($post->post_description, 100) }}</h5>
                      
                      <div>
                        <a href="{{ route('editPost', $post->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('deletePost', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                      </div>
                    </div>
              </div>
            </div>
              
          </div>
          @endforeach
    
      </div>
    
      <div class="d-flex justify-content-center">
          {{ $posts->links() }}
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

@else
<script>window.location = "/admin";</script>
@endif