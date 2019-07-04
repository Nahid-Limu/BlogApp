@extends('layouts.appAdmin')
@section('title', 'Edit Gallery')
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
        {{-- @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif --}}
        
        <!--Flash Message Start-->
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        @if(Session::has('message'))
        <script>
            var msg =' <?php echo Session::get('message');?>'
            swal(msg, "", "success");
        </script>
        @endif
        <!--Flash Message End-->
        
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
                        <a href="{{ route('deleteGalleryImage', $image->id) }}" onclick="return confirm('are you sure to Delete?')" class="btn btn-sm btn-danger">Delete</a>

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
