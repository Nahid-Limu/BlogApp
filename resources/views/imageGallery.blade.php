@extends('layouts.app') 
@section('css')
@endsection
@section('content')

@include('includes.nav')


<!-- Page Content -->
<section class="gallery-block grid-gallery">
  <div class="container">
      <div class="heading">
          <h2>Image Gallery</h2>
      </div>
      <div class="row">
        @foreach ($gallery as $image)
        <div class="col-md-6 col-lg-4 item">
            <a class="lightbox" href="{{ asset('images').'/'. $image->image }}">
                <img class="img-fluid image scale-on-hover" src="{{ asset('images').'/'.$image->image }}" style="width: 300px; height: 300px;">
            </a>
        </div>
        @endforeach
          
          
      </div>
      
      <div class="d-flex justify-content-center">
          {{ $gallery->links() }}
      </div>
  </div>
</section>
  <!-- /.container -->

@endsection
@section('script')
  <script>
      baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
  </script>
@endsection

