<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RYDOBD</title>
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
    
    
    
    @yield('css')

</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#" style="text-decoration: none;">
                        <i class="fa fa-user" aria-hidden="true" style="color: red;"></i> 
                        Welcome {{ Session::get('userName') }}
                    </a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown active">
                            <a href="{{ route('dashboard')}}">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning"></span>
                            </a>
                            {{-- <div class="sidebar-submenu" style="display:block;">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                        <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                        <li class="sidebar-dropdown">
                            <a href=" {{ route('post') }} ">
                            <i class="fa fa-plus"></i>
                            <span>Add New Post</span>
                            {{-- <span class="badge badge-pill badge-danger">3</span> --}}
                            </a>
                            
                        </li>
                        <li class="sidebar-dropdown">
                            <a href=" {{ route('event') }} ">
                            <i class="fa fa-calendar"></i>
                            <span>Add UpComing Event</span>
                            {{-- <span class="badge badge-pill badge-danger">3</span> --}}
                            </a>
                            
                        </li>
                        <li class="sidebar-dropdown">
                            <a href=" {{ route('imageGallery') }} ">
                                <i class="fa fa-upload"></i>
                                <span>Upload Image in Gallery</span>
                            </a>
                            
                        </li>
                        <li class="sidebar-dropdown">
                            <a href=" {{ route('moto') }} ">
                                <i class="fas fa-sync"></i>
                                <span>Update Moto</span>
                            </a>
                            
                        </li>
                        
                        
                        <li class="header-menu">
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
                        </li>
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
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="right"  title="Logout">
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

    </div>

</body>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/baguetteBox.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

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