

@extends('layouts.app')
@section('css')

@endsection
@section('content')

<div class="container jumbotron">
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
               
                <div class="col-md-6 col-lg-4 item">
                    <a class="lightbox" href="{{ asset('images').'/'. '1551383271.png' }}">
                        <img class="img-fluid image scale-on-hover" src="{{ asset('images').'/'.'1551383271.png' }}" style="width: 300px; height: 300px;">
                    </a>
                    <div>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>

                    </div>
                </div>
                
                  
                  
              </div>
          </div>
        </section>
          <!-- /.container -->

          <div class="d-flex justify-content-center">
              
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
