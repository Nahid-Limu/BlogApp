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

        <div class="container">
       
            <h3 class="jumbotron text-center text-info">Multiple Images Upload In Gallery</h3>
            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                          class="dropzone" id="dropzone">
            @csrf
        </form>
        </div>
    
</div>
@endsection

@section('script')
<script type="text/javascript">
    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            
            var name = file.upload.filename;
            var _token = '{{ csrf_token() }}';
            $.ajax({
                
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name, _token:_token},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
   
        success: function(file, response) 
        {
            console.log(response);
            
        },
        error: function(file, response)
        {
           return false;
        }
};
</script>
@endsection

@else
<script>window.location = "/admin";</script>
@endif