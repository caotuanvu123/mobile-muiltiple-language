<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title'){{config('app.name', '-tour') }}</title>

    <link rel="icon" href="images/logo.ico" sizes="192x192"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="T shop"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>

    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href=""><h1><img id="logo" src="{{asset('images/logo.png')}}" alt="Logo" width="80px"/></h1>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="header-right">
                            <div class="profile_details_left"><!--notifications of menu start -->
                                <div class="top-right links">
                                    <form action="{{ route('switchLang') }}" class="form-lang" method="post">
                                        <select name="locale" onchange='this.form.submit();'>
                                            <option value="vi">{{ trans('messages.vi') }}</option>
                                            <option value="en"{{ Lang::locale() === \App\Language::EN ? 'selected' : '' }}>{{ trans('messages.en') }}</option>
                                        </select>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <!--notification menu end -->
                            <div class="profile_details">
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">
                                                <div class="user-name">
                                                    {{--<p>{{trans('messages.hello')}}: {{\Auth::user()->name}}</p>--}}
                                                    {{--@if(\Auth::user()->type == \App\User::ADMIN)--}}
                                                        {{--<span>{{trans('messages.admin')}}</span>--}}
                                                    {{--@endif--}}
                                                </div>
                                                <i class="fa fa-angle-down lnr"></i>
                                                <i class="fa fa-angle-up lnr"></i>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="{{url('logout')}}"><i class="fa fa-sign-out"></i>{{trans('messages.logout_lable')}}</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                <div class="clearfix"></div>
            </div>
            <!--heder end here-->

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(session('alert-' . $msg))
                        <div class="alert alert-{{ $msg }}">
                            {{ session('alert-' . $msg) }}
                        </div>
                    @endif
                @endforeach
            </div>
            @yield('content')
            <div class="copyrights">
                <p>Copyright 2017 <a href="#" target="_blank">Dutch</a>. All Rights Reserved</p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"><a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a></div>
        <div class="menu">
            <ul id="menu">
                <li id="menu-home"><a href="{{url('/')}}"><i class="fa fa-tachometer"></i><span>{{trans('messages.home_lable')}}</span></a></li>
                <li><a href="{{route('category.index')}}"><i class="fa fa-list-alt" aria-hidden="true"></i><span>{{trans('messages.category_lable')}}</span></a></li>
                <li><a href="{{route('brand.index')}}"><i class="fa fa-tablet"></i><span>{{trans('messages.brand')}}</span></a></li>
                <li><a href="{{route('user.index')}}"><i class="fa fa-user"></i><span>{{trans('messages.user')}}</span></a></li>
                <li><a href="{{route('product.index')}}"><i class="fa fa-book" aria-hidden="true"></i><span>{{trans('messages.product')}}</span></a></li>
                <li><a href="{{route('order.index')}}"><i class="fa fa-first-order" aria-hidden="true"></i><span>{{trans('messages.order_list')}}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Scripts -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('bower_components/trumbowyg/dist/trumbowyg.min.js') }}"></script>
<script src="{{ asset('js/admin/common.js') }}"></script>
<!--slide bar menu end here-->
<script>
    var toggle = true;

    jQuery(".sidebar-icon").click(function () {
        if (toggle) {
            jQuery(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            jQuery("#menu span").css({"position": "absolute"});
        }
        else {
            jQuery(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function () {
                jQuery("#menu span").css({"position": "relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>
</body>
</html>