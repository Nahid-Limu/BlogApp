@if (Session::has('userId'))

@extends('layouts.appAdmin')
@section('content')

<div class="container jumbotron">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif

    <h1 class="text-center text-info">Add New Posts</h1>
    <form action=" {{ route('addPost') }} " method="POST" enctype="multipart/form-data">
        @csrf
    <table class="table table-bordered table-responsive">
    <tr >
            <td>
                <label for="postTitle">Post Title:</label>
            </td>
            <td>
                <input class="form-control" type="text" name="postTitle" id="postTitle" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="postDescription">Post Description:</label>
            </td>
            <td>
                <textarea cols="110" rows="10" type="text" name="postDescription" id="postDescription"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="image">Upload Image:</label>
            </td>
            <td>
                <input class="form-control" type="file" name="image" id="image">
            </td>
        </tr>

    </table>
    <button class="btn btn-info offset-6" type="submit">Add Post</button>
    </form>
</div>
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