@extends('layouts.app')
@section('title', 'View Post')
@section('content')
@section('css')

<style>
  hr.new2 {
    border-top: 1px dashed red;
  }
  li {
    list-style-type: none;
}
</style>

@endsection
@include('includes.nav')

<!-- Page Content -->
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{$post->post_title}}</h1>

      <!-- Author -->
      <p class="lead">
        Posted by
        <a href="#">Admin</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on {{ date('l jS \of F Y' ,strtotime($post->created_at)) }}</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{ asset('images').'/'.$post->image }}" alt=""
        style="width: 100%; height: 300px;">

      <hr>

      <!-- Post Content -->
      <p class="lead">{{$post->post_description}}</p>
      <hr>

      {{--  <div id="social-links">
          <ul>
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official">face</span></a></li>
            <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
            <li><a href="https://wa.me/?text=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li>    
          </ul>
      </div>  --}}
      <?php
      $url=request()->url();
      ?>
      <div class="footer">
          <p class="text-info text-center" style="font-size: 30px;">................Share This Post................</p>
        
          <div class="row bg-dark ">
            <div class="col-md-4" style="margin-top: 10px;">
                {!!Share::page("{{ route('$url')}}",$post->post_title)->facebook();!!}
            </div>
            <div class="col-md-4" style="margin-top: 10px;">
                {!!Share::page("{{ route('$url')}}", 'Your share text can be placed here')->twitter();!!}
            </div>
            <div class="col-md-4" style="margin-top: 10px;">
                {!!Share::page("{{ route('$url')}}", 'Share title')->linkedin();!!} 
            </div>
          </div>
   
      </div>
      <hr>

      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form>
            <div class="form-group">
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <!-- Single Comment -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
          vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
          lacinia congue felis in faucibus.
        </div>
      </div>

      <!-- Comment with nested comments -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
          vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
          lacinia congue felis in faucibus.

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
              odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
              fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
              odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
              fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Recent Post</h5>
        <div class="card-body">
          @foreach ($recent_post as $recent)
          <div class="row ">
            <div class="col-md-3">
              <div>
                <a href="{{ route('viewPost', $recent->id) }}" target="_blank"><img class="card-img-top" src="  {{ asset('images').'/'.$recent->image }} "
                    alt="no image found" style="width: 70px; height: 70px; margin-top: 40px;"></a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card-body">
                <h6 class="card-title">
                  <a href="{{ route('viewPost', $recent->id) }}" target="_blank" style="text-decoration:none;">{{ str_limit($recent->post_title, 80) }}</a>
                </h6>

                <span class="text-muted small">{{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans() }}</span>,
                <br><small>Publish Date: {{$post->created_at->toDateString()}}</small></h6>

              </div>
            </div>
          </div>
          <hr class="new2">
          @endforeach
          
        </div>
      </div>

      <!-- visitor Widget -->
      <div class="card my-4">
          <h5 class="card-header">Visitor Details</h5>
        {{--  <h5 class="card-header">Visitor Details</h5>  --}}
        <div class="card-body">
          <a href='https://writingmasterthesis.com/'>Writingmasterthesis.com</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=8b7c56124a7e9a3fee970fb146d50bb47db9fb42'></script>
          <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/546105/t/6"></script>
        </div>
      </div>

      <!-- Categories Widget -->
      {{--  <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <a href="#">HTML</a>
                </li>
                <li>
                  <a href="#">Freebies</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">JavaScript</a>
                </li>
                <li>
                  <a href="#">CSS</a>
                </li>
                <li>
                  <a href="#">Tutorials</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>  --}}

      <!-- Side Widget -->
      <div class="card my-4 border-info">
        <h5 class="card-header bg-info">Weather</h5>
        <div class="card-body">
          <!-- weather widget start -->
          <div id="m-booked-bl-simple-week-vertical-98029">
            <div class="booked-wzs-160-275 weather-customize" style="background-color:#137AE9; width:250px;"
              id="width3 "> <a target="_blank" class="booked-wzs-top-160-275" href="https://www.booked.net/"><img
                  src="//s.bookcdn.com/images/letter/s5.gif" alt="Booked" /></a>
              <div class="booked-wzs-160-275_in">
                <div class="booked-wzs-160-275-data">
                  <div class="booked-wzs-160-275-left-img wrz-18"></div>
                  <div class="booked-wzs-160-275-right">
                    <div class="booked-wzs-day-deck">
                      <div class="booked-wzs-day-val">
                        <div class="booked-wzs-day-number"><span class="plus">+</span>23</div>
                        <div class="booked-wzs-day-dergee">
                          <div class="booked-wzs-day-dergee-val">&deg;</div>
                          <div class="booked-wzs-day-dergee-name">C</div>
                        </div>
                      </div>
                      <div class="booked-wzs-day">
                        <div class="booked-wzs-day-d"><span class="plus">+</span>23&deg;</div>
                        <div class="booked-wzs-day-n"><span class="plus">+</span>22&deg;</div>
                      </div>
                    </div>
                    <div class="booked-wzs-160-275-info">
                      <div class="booked-wzs-160-275-city smolest">Panchagarh</div>
                      <div class="booked-wzs-160-275-date">Tuesday, 26</div>
                    </div>
                  </div>
                </div> <a target="_blank" href="https://www.booked.net/weather/panchagarh-w394072"
                  class="booked-wzs-bottom-160-275">
                  <table cellpadding="0" cellspacing="0" class="booked-wzs-table-160">
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Monday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>23&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>22&deg;</td>
                    </tr>
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Wednesday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>25&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>14&deg;</td>
                    </tr>
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Thursday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-03"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>28&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>17&deg;</td>
                    </tr>
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Friday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>32&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>18&deg;</td>
                    </tr>
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Saturday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>31&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>19&deg;</td>
                    </tr>
                    <tr>
                      <td class="week-day"> <span class="week-day-txt">Sunday</span></td>
                      <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                      </td>
                      <td class="week-day-val"><span class="plus">+</span>30&deg;</td>
                      <td class="week-day-val"><span class="plus">+</span>19&deg;</td>
                    </tr>
                  </table>
                  <div class="booked-wzs-center"> <span class="booked-wzs-bottom-l">See 7-Day Forecast</span> </div>
                </a>
              </div>
            </div>
            <script type="text/javascript">
              var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-98029'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } 
            </script>
            <script type="text/javascript" charset="UTF-8"
              src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=w394072&type=4&scode=2&ltid=3458&domid=w209&anc_id=44779&cmetric=1&wlangID=1&color=137AE9&wwidth=250&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0">
            </script><!-- weather widget end -->
          </div>
        </div>

      </div>

      <!-- Categories ads -->


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  @endsection
  @section('script')
      
  @endsection