@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection
@section('content')

@include('includes.nav')

<!-- Page Content -->
<div class="container">
    @php
    $today = Carbon\Carbon::now();
    
    @endphp  
  <span class="label label-primary center-block"> {{ date('h:i A')}} </span>
    

  <h1 class="my-4 alert-success">Welcome To RYDOBD.com
      <span class="pull-right">{{ $today->day.' '.$today->format('F').' '.$today->year }}</span>
  </h1>
  
  <!-- Marketing Icons Section -->
  {{-- <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Card Title</h4>
        <div class="card-body">
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class="card-footer">
          <a href="#" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Card Title</h4>
        <div class="card-body">
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi
            similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum
            sint fuga.</p>
        </div>
        <div class="card-footer">
          <a href="#" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Card Title</h4>
        <div class="card-body">
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class="card-footer">
          <a href="#" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- /.row -->

  <!-- Portfolio Section -->
  {{--  <h2>Portfolio Heading</h2>  --}}

  
  <!-- /.row -->

  <!-- Features Section -->
  <div class="row">
    <div class="col-lg-6">
      <h2>{{$post->post_title}}</h2>
      
      <p>{{$post->post_description}}</p>
    </div>
    <div class="col-lg-6">
      <img class="img-fluid rounded" src=" {{ asset('images').'/'.$post->image }} " alt="">
    </div>
  </div>
  <!-- /.row -->

  <hr>

  <!-- Call to Action Section -->
  {{--  <div class="row mb-4">
    <div class="col-md-8">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam
        harum neque nemo praesentium cum alias asperiores commodi.</p>
    </div>
    <div class="col-md-4">
      <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
    </div>
  </div>  --}}

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  
  <!-- /.container -->
  <div class="footer">
    <div class="container text-center">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-google-plus"></i></a>
      <a href="#"><i class="fa fa-skype"></i></a>
    </div>
  </div>
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
  </div>
</footer>
@endsection