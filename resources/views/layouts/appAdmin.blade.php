<?php
$url=request()->route()->getName();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(View::hasSection('title'))
        @yield('title')
        @else
        RYDOBD
        @endif
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img').'/'.'title-logo.png' }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add-post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/grid-gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('css/baguetteBox.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        img {
            border-radius: 50%;
        }
    </style>
    @yield('css')

</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand" id="profile-info">
                    <a href="#" style="text-decoration: none; text-align: center;">
                        @if(empty(Auth::user()->image))
                        <img src="{{asset('img/noProfilePic.jpg')}}" alt="" class="img img-circle"
                            style="width: 100px; height: 100px;">
                        @else
                        <img src="{{asset('img').'/'.Auth::user()->image}}" alt="" class="img img-circle"
                            style="width: 100px; height: 100px;">
                        @endif

                        <br>
                        <hr>
                        Welcome {{ Auth::user()->name }}
                    </a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <!-- sidebar-header  -->
                @if ($url==='dashboard')
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#changeImage"><i
                                class="fa fa-edit m-right-xs"></i>Photo</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#changePassword"><i
                                class="fa fa-edit m-right-xs"></i>Password</a>
                    </div>
                </div>
                @endif
                
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li @if($url==='dashboard' ) class="sidebar-dropdown active" @else class="sidebar-dropdown"
                            @endif>
                            <a href="{{ route('dashboard')}}">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning"></span>
                            </a>
                        </li>
                        <li @if($url==='post' ) class="sidebar-dropdown active" @else class="sidebar-dropdown" @endif>
                            <a href=" {{ route('post') }} ">
                                <i class="fa fa-plus"></i>
                                <span>Add New Post</span>
                                {{-- <span class="badge badge-pill badge-danger">3</span> --}}
                            </a>

                        </li>
                        <li @if($url==='event' ) class="sidebar-dropdown active" @else class="sidebar-dropdown" @endif>
                            <a href=" {{ route('event') }} ">
                                <i class="fa fa-calendar"></i>
                                <span>Add UpComing Event</span>
                                {{-- <span class="badge badge-pill badge-danger">3</span> --}}
                            </a>

                        </li>
                        <li @if($url==='imageGallery' ) class="sidebar-dropdown active" @else class="sidebar-dropdown"
                            @endif>
                            <a href=" {{ route('imageGallery') }} ">
                                <i class="fa fa-upload"></i>
                                <span>Upload Image in Gallery</span>
                            </a>

                        </li>
                        <li @if($url==='moto' ) class="sidebar-dropdown active" @else class="sidebar-dropdown" @endif>
                            <a href=" {{ route('moto') }} ">
                                <i class="fas fa-sync"></i>
                                <span>Update Moto</span>
                            </a>

                        </li>


                        {{--  <li class="header-menu">
                            <span>Profile</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                                <span class="badge badge-pill badge-primary">Beta</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>  --}}
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog show"></i>
                    <span class="badge-sonar"></span>
                    <ul class="list-categories">
                        <li>Bed</li>
                        <li>Bed</li>
                        <li>Bed</li>
                        <li>Bed</li>
                        <li>Bed</li>
                        <li>Bed</li>
                    </ul>
                </a>
                <a href="{{url('logout')}}" data-toggle="tooltip" data-placement="right" title="Logout">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">

            <div class="container-fluid">
                @yield('content')
            </div>

        </main>
        <footer>
            @include('includes.footer')
        </footer>
    </div>

</body>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/baguetteBox.js') }}"></script>
<script src="{{ asset('js/canvasjs.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script> -->

<script>
    jQuery(function ($) {
    
                  $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                  $(this)
                    .parent()
                    .hasClass("active")
                ) {
                  $(".sidebar-dropdown").removeClass("active");
                  $(this)
                    .parent()
                    .removeClass("active");
                } else {
                  $(".sidebar-dropdown").removeClass("active");
                  $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                  $(this)
                    .parent()
                    .addClass("active");
                }
              });
              
              $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
              });
              $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
              });
              
              
                 
                 
              });
              
              $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();   
                });

</script>


@yield('script')

</html>