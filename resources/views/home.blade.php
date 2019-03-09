@extends('layouts.app')
@section('css')
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  --}}
@endsection
@section('content')

@include('includes.nav')
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('img/Pic1.jpg')">
        <div class="carousel-caption d-none d-md-block">
          {{-- <h3>First Slide</h3>
          <p>This is a description for the first slide.</p> --}}
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('img/Pic2.jpg')">
        <div class="carousel-caption d-none d-md-block">
          {{-- <h3>Second Slide</h3>
          <p>This is a description for the second slide.</p> --}}
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('img/Pic3.jpg')">
        <div class="carousel-caption d-none d-md-block">
          {{-- <h3>Third Slide</h3>
          <p>This is a description for the third slide.</p> --}}
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
<!-- Page Content -->
<div class="container">
    @php
    $today = Carbon\Carbon::now();

    @endphp
  <span class="label label-primary center-block"> {{ date('h:i A')}} </span>


  <h1 class="my-4 alert-success">Welcome To RYDOBD.com
      <span class="pull-right">{{ $today->day.' '.$today->format('F').' '.$today->year }}</span>
  </h1>



  <div class="row">
    @foreach ($posts as $post)
    <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="{{ route('viewPost', $post->id) }}" ><img class="card-img-top" src=" {{ asset('images').'/'.$post->image }} " alt="no image found" style="width: 350px; height: 200px;"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ route('viewPost', $post->id) }}" style="text-decoration:none;">{{ $post->post_title }}</a>

            </h4>
            <small class="text-danger">{{$post->created_at->toDateString()}}</small>
            <br>
            {{ str_limit($post->post_description, 100) }}
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

@section('footer')
@include('includes.footer')  
@endsection
