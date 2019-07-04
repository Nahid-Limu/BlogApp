@extends('layouts.app')
@section('title', 'Contact Us')
@section('css')
<link href="{{ asset('css/contuct-main.css') }}" rel="stylesheet">
@endsection
@section('content')

@include('includes.nav')

<div class="contact1">
        @if(Session::has('message'))
        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ Session::get('message') }} </strong>
        </div>
        @endif
    <div class="container-contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="{{ asset('img').'/'.'img-01.png' }}" alt="IMG">
        </div>

        <form class="contact1-form validate-form" action="{{ route('sendmail') }}" method="POST">
            @csrf
            <span class="contact1-form-title">
                Get in touch
            </span>

            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                <input class="input1" type="text" name="name" placeholder="Name" required>
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input1" type="text" name="email" placeholder="Email">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Subject is required">
                <input class="input1" type="text" name="subject" placeholder="Subject">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Message is required">
                <textarea class="input1" name="message" placeholder="Message"></textarea>
                <span class="shadow-input1"></span>
            </div>

            <div class="container-contact1-form-btn">
                <button class="contact1-form-btn">
                    <span>
                        Send Email
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
  

@endsection

@section('script')
    <script>
            
            //flash msg
            $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                $("#successMessage").alert('close');
            });
    </script>
@endsection