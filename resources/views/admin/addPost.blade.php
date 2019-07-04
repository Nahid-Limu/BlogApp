@extends('layouts.appAdmin')
@section('title', 'Post')
@section('content')
{{-- @if(Session::has('message'))
<div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong> {{ Session::get('message') }} </strong>
</div>
@endif --}}
<!--Flash Message Start-->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@if(Session::has('message'))
<script>
    var msg =' <?php echo Session::get('message');?>'
    swal(msg, "", "success");
</script>
@endif
<!--Flash Message End-->
<div class="container ">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=" {{ route('dashboard') }} ">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Post</li>
        </ol>

        <div class="card card-6 border-info">
            <div class="card-heading bg-info">
                <h2 class="title">Add New Post</h2>
            </div>
            <form action=" {{ route('addPost') }} " method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                
                    <div class="form-row">
                        <div class="name">Post Title</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="postTitle" placeholder="Post Titile" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="name">Post Description</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="postDescription" placeholder="Post Details......"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Upload Image</div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <input class="input-file" type="file" name="image" id="file">
                                <label class="label--file" for="file">Choose file</label>
                                <span class="input-file__info">No file chosen</span>
                            </div>
                            {{--  <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size 50 MB</div>  --}}
                        </div>
                    </div>
                
            </div>
            <div class="card-footer">
                <button class="btn btn--radius-2 btn--blue-2" type="submit"><i class="fa fa-plus"></i> Add Post</button>
            </div>
            </form>
        </div>
    
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
