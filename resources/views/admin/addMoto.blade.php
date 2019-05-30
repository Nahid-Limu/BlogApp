@if (Session::has('userId'))

@extends('layouts.appAdmin')
@section('content')

<div class="container ">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=" {{ route('dashboard') }} ">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Moto</li>
        </ol>

        <div class="card card-6 border-info">
            <div class="card-heading bg-info">
                <h2 class="title">Add New Moto</h2>
            </div>
            <form action=" {{ route('addMoto')}} " method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                    
                    <div class="form-row">
                        <div class="name">Add Moto</div>
                        <div class="value">
                            <input type="hidden" name="id" value="{{$moto->id}}">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="addmoto" placeholder="Add Moto">{{$moto->moto}}</textarea>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="card-footer">
                <button class="btn btn--radius-2 btn--blue-2" type="submit"><i class="fas fa-sync"></i> Update Moto</button>
            </div>
            </form>
        </div>
    
</div>
@include('includes.footer')
@endsection

@section('script')
    <script>
            //text eiditior
            //tinymce.init({selector: 'textarea'});

            //flash msg
            $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                $("#successMessage").alert('close');
            });
    </script>
@endsection

@else
<script>window.location = "/admin";</script>
@endif