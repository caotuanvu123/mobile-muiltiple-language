<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobile Store</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!-- Custom Theme files -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" rel="stylesheet">

    <link href="{{asset('css/fontend/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/fontend/fasthover.cs')}}s" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/fontend/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/fontend/jquery.countdown.css')}}" /> <!-- countdown -->
    <!-- //js -->
    <!-- web fonts -->
    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web fonts -->
    <!-- start-smooth-scrolling -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
</head>
<body>
{{--
     <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
            <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
        </div>
    </div>
--}}
<!-- header -->
<div class="header" id="home1">
    <div class="container">
        <div class="w3l_logo">
            <h1><a href="{{route('frontend.index')}}">Mobile Store<span>22 Nguyễn Huệ - Hồ Chí Minh city.</span></a></h1>
        </div>
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="fa fa-language" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="{{ route('switchLang') }}" class="form-lang" method="post">
                    <select name="locale" onchange='this.form.submit();'>
                        <option value="vi">{{ trans('messages.vi') }}</option>
                        <option value="en"{{ Lang::locale() === \App\Language::EN ? 'selected' : '' }}>{{ trans('messages.en') }}</option>
                    </select>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <div class="cart cart box_1">
            <div>
                <a href="{{route('all_cart.product')}}" class="w3view-cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span style="color: white;">{{\Cart::count()}} </span></a>
            </div>
        </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('frontend.index')}}" class="{{ Request::is('/') ? 'act' : '' }}">{{trans('messages.home')}}</a></li>
                    <!-- Mega Menu -->
                    <li>
                        <a href="{{route('frontend.product')}}" class="{{ Request::is('product') ? 'act' : '' }}">{{trans('messages.product')}}</a>
                    </li>
                    <li><a href="{{route('frontend_about')}}" class="{{ Request::is('about') ? 'act' : '' }}">{{trans('messages.about_us')}}</a></li>
                    <li><a href="{{route('frontend_contact')}}" class="{{ Request::is('contact') ? 'act' : '' }}">{{trans('messages.mail_us')}}</a></li>
                    <li class="w3pages open"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('messages.user_lable')}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if (Route::has('login'))
                                    @auth
                                        <li>{{trans('messages.hello')}} : {{\Auth::user()->name}}</li>
                                        @if(\Laratrust::hasRole('admin'))
                                        <li><a href="{{route('index')}}">{{trans('messages.admin_page')}}</a> </li>
                                        @endif
                                        <li> <a href="{{url('logout')}}"><i class="fa fa-sign-out"></i>{{trans('messages.logout_lable')}}</a> </li>
                                    @else
                                        <li><a href="{{ route('login') }}">{{trans('messages.login_lable')}}</a></li>
                                        <li><a href="{{ route('register') }}">{{trans('messages.register_lable')}}</a></li>
                                    @endauth
                            @endif
                        </ul>
                    </li>
                    {{--<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="icons.html">Web Icons</a></li>--}}
                            {{--<li><a href="codes.html">Short Codes</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </nav>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(session('alert-' . $msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
    </div>
</div>
<!-- //navigation -->
@yield('content')
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="col-md-6 w3agile_newsletter_left">
            <h3>{{trans('messages.messages_contact')}}</h3>
            <p>{{trans('messages.contact_submit')}}</p>
        </div>
        <div class="col-md-6 w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" placeholder="Email" required="">
                <input type="submit" value="" />
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="mail.html">Contact Us</a></li>
                    <li><a href="codes.html">Short Codes</a></li>
                    <li><a href="faq.html">FAQ's</a></li>
                    <li><a href="products.html">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><a href="products.html">Mobiles</a></li>
                    <li><a href="products1.html">Laptops</a></li>
                    <li><a href="products.html">Purifiers</a></li>
                    <li><a href="products1.html">Wearables</a></li>
                    <li><a href="products2.html">Kitchen</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Today's Deals</a></li>
                </ul>
                <h4>Follow Us</h4>
                <div class="agileits_social_button">
                    <ul>
                        <li><a href="#" class="facebook"> </a></li>
                        <li><a href="#" class="twitter"> </a></li>
                        <li><a href="#" class="google"> </a></li>
                        <li><a href="#" class="pinterest"> </a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="{{asset('images/frontend/arrow.png')}}" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p>&copy; 2017 Mobile Store. All rights reserved | Design by <a href="">Dutch</a></p>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- cart-js -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('bower_components/trumbowyg/dist/trumbowyg.min.js') }}"></script>
<script src="{{ asset('js/admin/common.js') }}"></script>
@stack('scripts')
<!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5b6fbd21afc2c34e96e77ed3/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->
@stack('scripts')
</body>
</html>