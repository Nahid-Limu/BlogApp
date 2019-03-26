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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footerLink.css') }}" rel="stylesheet">

    <link href="{{ asset('css/grid-gallery.css') }}" rel="stylesheet">
     
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="app">


        <main class="py-4">
            @yield('content')


        </main>
    </div>
</body>
<footer class="bg-dark">

  <!-- /.container -->
  <div class="footer">

    <div class="container text-center background">
      <span>
          <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-facebook"></i></a>
          <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-twitter"></i></a>
          <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-youtube"></i></a>
          <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-linkedin"></i></a>
 
      </span>
  </div>
  </div>
  <div class="container">
    <p class="m-0 text-center text-white">&copy; Copyright 2019 Developed by --Nahid Limu-- All Rights Reserved. <a href="https://www.facebook.com/nahidlimu" target="_blank" style="text-decoration: none;"> (Contuct us <i class="fa fa-round fa-facebook" style="font-size: 18px;"></i>)</a></p>
  </div>
</footer>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    
    {{-- <script>
        $.material.init()
    </script> --}}

    @yield('script')
</html>
