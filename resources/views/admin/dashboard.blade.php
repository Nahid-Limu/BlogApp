@extends('layouts.appAdmin') 
@section('title', 'Dashbord')
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
                    <div class="col-xl-4 col-sm-6 mb-4">
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
                    <div class="col-xl-4 col-sm-6 mb-4">
                      <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                          </div>
                          <div class="mr-5">{{$totalImage}} Images in Gallery!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    {{--  <div class="col-xl-3 col-sm-6 mb-3">
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
                    </div>  --}}
                    <div class="col-xl-4 col-sm-6 mb-4">
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
    <!-- Modal Start -->
    @include('admin.modal.change_password')
    @include('admin.modal.change_photo')
    <!-- Modal End -->
</div>

@endsection

@section('script')
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
          {y: {{$totalpost}}, label: "Total Post", color: "#3490dc" },
          {y: {{$totalevent}}, label: "Total UpComing Event", color: "#38c172"},
          {y: {{$totalImage}}, label: "Total Image in Gallery", color: "#e3342f"},
          
        ]
      }]
    });
    chart.render();
    
    }
$(document).ready(function(){
  
    $('#show').click(function(){
        if($("#new_password").val() != '' ){
            
            $("#new_password").attr("type","text");
            $("#confirm_password").attr("type","text");
        }
        
    });

    $( "#changePass" ).click(function() {
        var _token = '{{ csrf_token() }}';
        var updatePassword = $('#change_password').serialize();
        alert(_token);
            $.ajax({
                url:"{{route('change_password')}}",
                method:"post",
                data: updatePassword,
                success:function (response) {
                    //console.log(response);
                    var html = '';
                    if(response.errors)
                    {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < response.errors.length; count++)
                    {
                    html += '<p>' + response.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#password_form_result').html(html);
                    }
                    if(response.falied)
                    {
                        swal(response.falied, "", "error");
                    }
                    if(response.success)
                    {
                        swal(response.success, "", "success");
                        $('#password_form_result').hide();
                        $('#change_password')[0].reset();
                        $('#changePassword').modal('hide');
                    }
                }
            });
        });

        //Change Profile picture
        $('#changePhoto_modal_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
            url:"{{ route('update_photo') }}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                var html = '';
                if(response.errors)
                {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < response.errors.length; count++)
                {
                html += '<p>' + response.errors[count] + '</p>';
                }
                html += '</div>';
                $('#form_result').html(html);
                }
                if(response.error)
                {
                swal(response.error, "", "error");
                $('#changePhoto_modal_form')[0].reset();
                $('#changeImage').modal('hide');
                }
                if(response.success)
                {
                swal(response.success, "", "success");
                $("#profile-info").load(" #profile-info");
                $('#changePhoto_modal_form')[0].reset();
                $('#changeImage').modal('hide');
                }
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    console.log('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    console.log('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    console.log('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    console.log('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    console.log('Time out error.');
                } else if (exception === 'abort') {
                    console.log('Ajax request aborted.');
                } else {
                    console.log('Uncaught Error.\n' + jqXHR.responseText);
                }
            }
            
            })
        });
      
      });
    </script>
@endsection
