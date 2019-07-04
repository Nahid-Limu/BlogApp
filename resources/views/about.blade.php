@extends('layouts.app')
@section('title', 'About Us')
@section('css')

<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <style>
            body {
                font-family: 'Roboto';font-size: 16px;
            }
            
            .aboutus-section {
                padding: 90px 0;
            }
            .aboutus-title {
                font-size: 30px;
                letter-spacing: 0;
                line-height: 32px;
                margin: 0 0 39px;
                padding: 0 0 11px;
                position: relative;
                text-transform: uppercase;
                color: #000;
            }
            .aboutus-title::after {
                background: #fdb801 none repeat scroll 0 0;
                bottom: 0;
                content: "";
                height: 2px;
                left: 0;
                position: absolute;
                width: 54px;
            }
            .aboutus-text {
                color: #606060;
                font-size: 13px;
                line-height: 22px;
                margin: 0 0 35px;
            }
            
            a:hover, a:active {
                color: #ffb901;
                text-decoration: none;
                outline: 0;
            }
            .aboutus-more {
                border: 1px solid #fdb801;
                border-radius: 25px;
                color: #fdb801;
                display: inline-block;
                font-size: 14px;
                font-weight: 700;
                letter-spacing: 0;
                padding: 7px 20px;
                text-transform: uppercase;
            }
            .feature .feature-box .iconset {
                background: #fff none repeat scroll 0 0;
                float: left;
                position: relative;
                width: 18%;
            }
            .feature .feature-box .iconset::after {
                background: #fdb801 none repeat scroll 0 0;
                content: "";
                height: 150%;
                left: 43%;
                position: absolute;
                top: 100%;
                width: 1px;
            }
            
            .feature .feature-box .feature-content h4 {
                color: #0f0f0f;
                font-size: 18px;
                letter-spacing: 0;
                line-height: 22px;
                margin: 0 0 5px;
            }
            
            
            .feature .feature-box .feature-content {
                float: left;
                padding-left: 28px;
                width: 78%;
            }
            .feature .feature-box .feature-content h4 {
                color: #0f0f0f;
                font-size: 18px;
                letter-spacing: 0;
                line-height: 22px;
                margin: 0 0 5px;
            }
            .feature .feature-box .feature-content p {
                color: #606060;
                font-size: 13px;
                line-height: 22px;
            }
            .icon {
                color : #f4b841;
                padding:0px;
                font-size:40px;
                border: 1px solid #fdb801;
                border-radius: 100px;
                color: #fdb801;
                font-size: 28px;
                height: 70px;
                line-height: 70px;
                text-align: center;
                width: 70px;
            }
            }
    </style>
@endsection
@section('content')

@include('includes.nav')

<!-- Page Content -->

<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Us</h2>
                        <p class="aboutus-text">
                                রাজমহল যুব উন্নয়ন সংস্থা একটি অ-রাজনৈতিক, বে-সরকারী ও ব্যতিক্রমধর্মী শিক্ষা, প্রশিক্ষন এবং তথ্য-প্রযুক্তি ভিত্তিক বিনোদনমূলক স্বেচ্ছাসেবী প্রতিষ্টান। অত্র প্রতিষ্ঠানটি প্রগতিশীল যুব সংঘের পরিচালনায় একশনএইড বাংলাদেশ-এর বিএফআই প্রকল্পের সহযোগীতায় পরিচালিত যুবদের সমন্বয়ে অঙ্গীকার সমাজ উন্নয়ন সংস্থা-এর উন্নয়নকর্মীদের পরামর্শ ও সহযোগীতায় প্রতিষ্ঠিত। সদ্য বিলুপÍ ছিটমহলে প্রত্যন্ত গ্রামাঞ্চলের যুব সমাজের মধ্যে ভাতৃত্ব সৃষ্টি, একতাবদ্ধ রাখা, তাদের নেতৃত্ব বিকাশ, ক্ষুদ্র নৃ-গোষ্ঠির অধিকার আদায় সহ সমাজের নীতি নির্ধারকদের প্রভাবিত করার দৃঢ় প্রত্যয় নিয়ে প্রগতিশীল যুব সংঘের সহযোগীতায় অত্র রাজমহল যুব উন্নয়ন সংস্থা সমাজের উন্নয়নে ক্রমান্বয়ে সামনের দিকে এগিয়ে যাবে। উন্নয়নে যুব সমাজ একটি বিশাল শক্তি, তাই রাজমহল যুব উন্নয়ন সংস্থার মাধ্যমে সমাজের সকল শ্রেণীর যুবদের নেতৃত্বের বিকাশ, বেকার যুবদেরকে নানাবিধ আত্ন-কর্মসংস্থানমূলক শিক্ষা ও প্রশিক্ষন প্রদানের মাধ্যমে তাদেরকে বিভিন্নভাবে কাজে লাগানোর মহান লক্ষ্য নিয়ে রাজমহল যুব উন্নয়ন সংস্থাটি আলোর দিশারী হিসাবে নিরলসভাবে কাজ করে যাবে।
                        </p>
                        <a class="aboutus-more" href="#">read more</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="{{ asset('img').'/'.'momin-web.png' }}" alt="" style="width: 176px; height: 376px;">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Work with heart</h4>
                                    <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Reliable services</h4>
                                    <p>Donec vitae sapien ut libero venenatis faucibu. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Great support</h4>
                                    <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

@endsection
