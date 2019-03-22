@extends('layouts.app')
@section('css')
<style>
    .myButton {
      -moz-box-shadow: 3px 4px 0px 0px #8a2a21;
      -webkit-box-shadow: 3px 4px 0px 0px #8a2a21;
      box-shadow: 3px 4px 0px 0px #8a2a21;
      background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24437));
      background:-moz-linear-gradient(top, #c62d1f 5%, #f24437 100%);
      background:-webkit-linear-gradient(top, #c62d1f 5%, #f24437 100%);
      background:-o-linear-gradient(top, #c62d1f 5%, #f24437 100%);
      background:-ms-linear-gradient(top, #c62d1f 5%, #f24437 100%);
      background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24437',GradientType=0);
      background-color:#c62d1f;
      -moz-border-radius:18px;
      -webkit-border-radius:18px;
      border-radius:18px;
      border:1px solid #d02718;
      display:inline-block;
      cursor:pointer;
      color:#ffffff;
      font-family:Arial;
      font-size:13px;
      padding:2px 25px;
      text-decoration:none;
      text-shadow:0px 1px 0px #810e05;
    }
    .myButton:hover {
      background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24437), color-stop(1, #c62d1f));
      background:-moz-linear-gradient(top, #f24437 5%, #c62d1f 100%);
      background:-webkit-linear-gradient(top, #f24437 5%, #c62d1f 100%);
      background:-o-linear-gradient(top, #f24437 5%, #c62d1f 100%);
      background:-ms-linear-gradient(top, #f24437 5%, #c62d1f 100%);
      background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24437', endColorstr='#c62d1f',GradientType=0);
      background-color:#f24437;
      text-decoration: none;
    }
    .myButton:active {
      position:relative;
      top:1px;
    }
    
</style>
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  --}}
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
  
    <span  class="badge badge-warning" style="text-align: center;"> {{ date('h:i A')}} </span>


  <h1 class="my-4 alert-success">Welcome To RYDOBD.com
      <span class="pull-right">{{ $today->day.' '.$today->format('F').' '.$today->year }}</span>
  </h1>
  
  <h2>Events</h2>
  
  <div class="row">
      @foreach ($posts as $post)
      <div class="col-lg-6 col-sm-6 portfolio-item">
        <div class="row ">
          <div class="col-md-4">
              <div >
                  <a href="{{ route('viewPost', $post->id) }}" ><img class="card-img-top" src=" {{ asset('images').'/'.$post->image }} " alt="no image found" style="width: 200px; height: 200px;"></a>
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
                      <a href="{{ route('viewPost', $post->id) }}" class="myButton">Read More</a>
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
