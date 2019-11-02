<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(View::hasSection('title'))
        @yield('title')
        @else
        RYDOBD
        @endif
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img').'/'.'title-logo.png' }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- ads -->
    {{--  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-1779671886822617",
              enable_page_level_ads: true
         });
    </script>  --}}


    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footerLink.css') }}" rel="stylesheet">
    <link href="{{ asset('css/baguetteBox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/grid-gallery.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>


    </style>
    @yield('css')

</head>

<body>
    <div id="">


        <main class="py-4">
            @yield('content')


        </main>
    </div>
</body>
<footer class="bg-dark">

    <!-- /.container -->
    {{--  <div class="footer">

        
    </div>  --}}
    <div class="container text-center">
        <span>
            <a href="https://www.facebook.com/groups/489402054899329/" target="_blank" style="text-decoration: none;"><i
                    class="fa fa-round fa-facebook"></i></a>
            <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-twitter"></i></a>
            <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-youtube"></i></a>
            <a href="" target="_blank" style="text-decoration: none;"><i class="fa fa-round fa-linkedin"></i></a>
        </span>
    </div>
    <div class="container">
        <p class="m-0 text-center text-white">&copy; Copyright 2019 Developed by --Nahid Limu-- All Rights Reserved. <a
                href="https://www.facebook.com/nahidlimu" target="_blank" style="text-decoration: none;"> (Contuct us <i
                    class="fa fa-round fa-facebook" style="font-size: 18px;"></i>)</a></p>
    </div>
</footer>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/baguetteBox.js') }}"></script>
<script src="{{ asset('js/share.js') }}"></script>

<script type="text/javascript">
    var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow14.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();
</script>
<noscript>Not seeing a <a href="https://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more
    info.</noscript>


{{-- <script>
        $.material.init()
    </script> --}}

@yield('script')

</html>