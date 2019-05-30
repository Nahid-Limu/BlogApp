@if (Session::has('userId'))

@extends('layouts.appAdmin') 

@section('content')

<div class="">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <div id="content-wrapper">

                <div class="container-fluid">
          
                  
          
                  <!-- Icon Cards-->
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                          </div>
                          <div class="mr-5">{{$totalpost}} Post</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{ route('adminViewPost') }}">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                          </div>
                          <div class="mr-5">{{$totalImage}} Images in Gallery!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{ route('adminViewGallery') }}">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </div>
                          <div class="mr-5"> {{$totalevent}} New Events</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{ route('adminViewEvent') }}">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                          </div>
                          <div class="mr-5">13 New Tickets!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
        
                  <!-- Area Chart Example-->
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-area"></i>
                      All Post In Chart 
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                      
              
                    </div>
                    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                  </div>
          
                  <!-- DataTables Example -->
                  
          
                </div>
                <!-- /.container-fluid -->
          
                
          
              </div>
    
</div>
@include('includes.footer')
@endsection

@section('script')
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
    window.onload = function() {
    
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      title: {
        text: "Post Statistics"
      },
      data: [{
        type: "pie",
        startAngle: 240,
        yValueFormatString: "",
        indexLabel: "{label} {y}",
        dataPoints: [
          {y: {{$totalpost}}, label: "Total Post"},
          {y: {{$totalevent}}, label: "Total UpComing Event"},
          {y: {{$totalImage}}, label: "Total Image in Gallery"},
          
        ]
      }]
    });
    chart.render();
    
    }
    </script>
@endsection

@else
<script>window.location = "/admin";</script>
@endif