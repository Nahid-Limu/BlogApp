@if (Session::has('userId'))

@extends('layouts.appAdmin')
@section('css')

@endsection
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Gallery</li>
</ol>
<div class="container">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
        
        <!-- Page Content -->
        <section class="gallery-block grid-gallery">
          <div class="">
              <div class="heading">
                  <h2>Image Gallery</h2>
              </div>
              <div class="row">
                @foreach ($gallery as $image)
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="{{ asset('images').'/'. $image->image }}">
                        <img class="img-fluid image scale-on-hover" src="{{ asset('images').'/'.$image->image }}" style="width: 300px; height: 300px;">
                    </a>
                    <div>
                        <a href="{{ route('deleteGalleryImage', $image->id) }}" class="btn btn-sm btn-danger">Delete</a>

                    </div>
                </div>
                @endforeach
                  
                  
              </div>
          </div>
        </section>
          <!-- /.container -->

          <div class="d-flex justify-content-center">
              {{ $gallery->links() }}
          </div>
</div>
@include('includes.footer')
@endsection

@section('script')
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
    </script>
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
