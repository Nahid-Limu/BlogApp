@if (Session::has('userId'))

@extends('layouts.appAdmin') 
@section('content')

<div class="jumbotron">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif

        <div id="content-wrapper">

                <div class="container-fluid">
          
                  <!-- Breadcrumbs-->
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                  </ol>
          
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
                          <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
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
                            <i class="fas fa-fw fa-shopping-cart"></i>
                          </div>
                          <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
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
                  <a href="{{ route('logout') }}">Logout</a>
                  <!-- Area Chart Example-->
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-area"></i>
                      Area Chart 
                      <h1>{{ Session::get('userName') }}</h1>
                    </div>
                    <div class="card-body">
                      <canvas id="myAreaChart" width="100%" height="30"></canvas>
                      hello
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
          
                  <!-- DataTables Example -->
                  
          
                </div>
                <!-- /.container-fluid -->
          
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright © Your Website 2019</span>
                    </div>
                  </div>
                </footer>
          
              </div>
    
</div>
@endsection

@section('script')
    
@endsection

@else
<script>window.location = "/admin";</script>
@endif