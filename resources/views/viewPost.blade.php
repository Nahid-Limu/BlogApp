@extends('layouts.app') 
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

@endsection