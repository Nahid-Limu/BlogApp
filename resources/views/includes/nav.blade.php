
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/" style="font-family: Curlz MT; font-size: 30px; color: red;">
        <img class="card-img-top" src=" {{ asset('img').'/'.'logo.png' }} " alt="no image found" style="width: 50px; height:50px;">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html"><i class="fa fa-calendar" aria-hidden="true"></i> UpComming Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=" {{route('gallery')}} "><i class="fa fa-file-image-o" aria-hidden="true"></i> Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=" {{ route('about') }} "><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=" {{ route('about') }} "><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  