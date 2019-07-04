@extends('layouts.appAdmin') 
@section('title', 'All Post')
@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">All Post</li>
</ol>
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
          <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="row ">
              <div class="col-md-4">
                  <div >
                      <a href="{{ route('viewPost', $post->id) }}" ><img class="card-img-top" src=" {{ asset('images').'/'.$post->image }} " alt="no image found" style="width: 150px; height: 150px; margin-top: 20px;"></a>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h5 class="card-title">
                        <a href="{{ route('viewPost', $post->id) }}" style="text-decoration:none;">{{ str_limit($post->post_title, 80) }}</a>
                      </h5>
    
                      <h6>By Admin, <span class="text-muted small">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>, <br><small>Publish Date: {{$post->created_at->toDateString()}}</small></h6>
                      
    
                      <h6>{{ str_limit($post->post_description, 60) }}</h6>
                      
                      <div>
                        <a href="{{ route('editPost', $post->id) }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i> Edit</a>
                        <a href="{{ route('deletePost', $post->id) }}" onclick="return confirm('are you sure to Delete?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
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
