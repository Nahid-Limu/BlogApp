@extends('layouts.app') 
@section('title', 'Event')
@section('content')

@include('includes.nav')

<!-- Page Content -->
<!-- Page Content -->
  <div class="container">

    <div class="row">

   
      <!-- Post Content Column -->
      <div class="col-lg-8">

      @foreach ($events as $key => $event)

        <!-- Title -->
        <h1 class="mt-4"><b>{{++$key}}</b>.{{$event->event_title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Admin</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <b>Event Date : {{ date('l jS \of F Y' ,strtotime($event->event_date)) }}</b>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset('images').'/'.$event->image }}" alt="" style="width: 100%; height: 30%;">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$event->event_description}}</p>
        <hr>

        
        @endforeach
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
      </div>
    
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        
        <!-- visitor Widget -->
        <div class="card my-4">
          <h5 class="card-header">Visitor Details</h5>
          <div class="card-body">
            <a href='https://freehitcounters.org/'>FreeHitcounters.org</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=ce78ec242005420c7c6e3f38326bd898cb2793d6'></script>
            <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/512989/t/0"></script>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
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
        </div>

        <!-- Side Widget -->
        <div class="card my-4 border-info">
          <h5 class="card-header bg-info">Weather</h5>
          <div class="card-body">
            <!-- weather widget start --><div id="m-booked-bl-simple-week-vertical-98029"> <div class="booked-wzs-160-275 weather-customize" style="background-color:#137AE9; width:250px;" id="width3 " > <a target="_blank" class="booked-wzs-top-160-275" href="https://www.booked.net/"><img src="//s.bookcdn.com/images/letter/s5.gif" alt="Booked" /></a> <div class="booked-wzs-160-275_in"> <div class="booked-wzs-160-275-data"> <div class="booked-wzs-160-275-left-img wrz-18"></div> <div class="booked-wzs-160-275-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>23</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d"><span class="plus">+</span>23&deg;</div> <div class="booked-wzs-day-n"><span class="plus">+</span>22&deg;</div> </div> </div> <div class="booked-wzs-160-275-info"> <div class="booked-wzs-160-275-city smolest">Panchagarh</div> <div class="booked-wzs-160-275-date">Tuesday, 26</div> </div> </div> </div> <a target="_blank" href="https://www.booked.net/weather/panchagarh-w394072" class="booked-wzs-bottom-160-275" > <table cellpadding="0" cellspacing="0" class="booked-wzs-table-160"> <tr> <td class="week-day"> <span class="week-day-txt">Monday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>23&deg;</td> <td class="week-day-val"><span class="plus">+</span>22&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Wednesday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>25&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Thursday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-val"><span class="plus">+</span>28&deg;</td> <td class="week-day-val"><span class="plus">+</span>17&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Friday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-01"></div></td> <td class="week-day-val"><span class="plus">+</span>32&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Saturday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>31&deg;</td> <td class="week-day-val"><span class="plus">+</span>19&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Sunday</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>30&deg;</td> <td class="week-day-val"><span class="plus">+</span>19&deg;</td> </tr> </table> <div class="booked-wzs-center"> <span class="booked-wzs-bottom-l">See 7-Day Forecast</span> </div> </a> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-98029'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=w394072&type=4&scode=2&ltid=3458&domid=w209&anc_id=44779&cmetric=1&wlangID=1&color=137AE9&wwidth=250&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection