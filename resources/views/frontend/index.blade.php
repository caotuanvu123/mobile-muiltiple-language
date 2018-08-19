@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <h3>Mobile Store, <span>{{trans('messages.special_deals')}}</span></h3>
        </div>
    </div>
    <!-- //banner -->


    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="col-md-5 wthree_banner_bottom_left">
                <div class="video-img">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                        <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- pop-up-box -->
                <script src="{{asset('js/fontend/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                <!--//pop-up-box -->
                <div id="small-dialog" class="mfp-hide">
                    <iframe src="https://www.youtube.com/embed/l0DoQYGZt8M" ></iframe>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
            </div>
            <div class="col-md-7 wthree_banner_bottom_right">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#" id="home-tab" role="tab" data-toggle="tab" aria-controls="home">Sản phẩm mới</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                            <div class="agile_ecommerce_tabs">
                                @forelse($newProduct as $pro)
                                    <div class="col-md-4 agile_ecommerce_tab_left">
                                        <div class="hs-wrapper">
                                            <img src="{{route('product.image', $pro->id)}}" alt=" " class="img-responsive" />
                                            <div class="w3_hs_bottom">
                                                <ul>
                                                    <li>
                                                        <a href="{{route('frontend.detail', $pro->id)}}" data-toggle="modal" data-target="#myModal" class="showCommonModel" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h5><a href="{{route('frontend.product.detail', $pro->id)}}">{{$pro->name}}</a></h5>
                                        <div class="simpleCart_shelfItem">
                                            <p><i class="item_price">{{number_format($pro->price, 0, ',', '.')}} {{trans('messages.money')}}</i></p>
                                            <div>
                                                <a href="{{route('cart.product', $pro->id)}}" class="w3ls-cart">{{trans('messages.add_to_cart')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-4 agile_ecommerce_tab_left">{{trans('messages.no_data')}}</div>
                                @endforelse
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //banner-bottom -->
    <!-- modal-video -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog common_ajax" role="document" style="margin-top: 0px;">

        </div>
    </div>
    <!-- //modal-video -->

    <!-- banner-bottom1 -->
    <div class="banner-bottom1">
        <div class="agileinfo_banner_bottom1_grids">
            <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
                <h3>{{trans('messages.opening')}}<span>20% <i>{{trans('messages.special_deals')}}</i></span></h3>
                <a href="{{route('frontend_promotion')}}">{{trans('messages.shop_now')}}</a>
            </div>
            <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
                <h4>{{trans('messages.special_deals')}}</h4>
                <div class="timer_wrap">
                    <div id="counter"> </div>
                </div>
                <script src="{{asset('js/fontend/jquery.countdown.js')}}"></script>
                <script src="{{asset('js/fontend/script.js')}}"></script>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //banner-bottom1 -->
    <!-- special-deals -->
    <div class="special-deals">
        <div class="container">
            <h2>{{trans('messages.special_deals')}}</h2>
            <div class="w3agile_special_deals_grids">
                <div class="col-md-7 w3agile_special_deals_grid_left">
                    <div class="w3agile_special_deals_grid_left_grid">
                        <img src="{{asset('images/frontend/21.png')}}" alt="Special Deals" class="img-responsive" />
                        <div class="w3agile_special_deals_grid_left_grid_pos1">
                            <h5>30%<span>{{trans('messages.discount')}}/-</span></h5>
                        </div>
                        <div class="w3agile_special_deals_grid_left_grid_pos">
                            <h4>{{trans('messages.we_offer')}}<span>{{trans('messages.best_product')}}</span></h4>
                        </div>
                    </div>
                    <div class="wmuSlider example1">
                        <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('images/frontend/t1.png')}}" alt="Special Deals" class="img-responsive" />
                                        <p>{{trans('messages.comment_product')}}</p>
                                        <h4>Laura</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('images/frontend/t2.png')}}" alt="Special Deals" class="img-responsive" />
                                        <p>{{trans('messages.comment_product')}}</p>
                                        <h4>Michael</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('images/frontend/t3.png')}}" alt="Special Deals" class="img-responsive" />
                                        <p>{{trans('messages.comment_product')}}</p>
                                        <h4>Rosy</h4>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <script src="{{asset('js/fontend/jquery.wmuSlider.js')}}"></script>
                    <script>
                        $('.example1').wmuSlider();
                    </script>
                </div>
                <div class="col-md-5 w3agile_special_deals_grid_right">
                    <img src="{{asset('images/frontend/20.jpg')}}" alt=" " class="img-responsive" />
                    <div class="w3agile_special_deals_grid_right_pos">
                        <h4>{{trans('messages.best_product')}}</h4>
                        <h5>{{trans('messages.save')}}<span>{{trans('messages.to')}}</span> 30%</h5>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //special-deals -->
    <div class="container">
        <form action="{{route('frontend.index')}}" method="GET" role="form" class="form-add-info">
            {{ csrf_field() }}
            <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
                <p class="text-center" style="margin-bottom: 10px;">{{trans('messages.search_product')}}</p>
                <input type="text" class="form-control" name="search" placeholder="{{trans('messages.search_product')}}">
            </div>
            <button type="submit" class="btn btn-primary">{{trans('messages.search')}}</button>
        </form>
    </div>
    <!-- new-products -->
    <div class="new-products">
        <div class="container">
            <h3>{{trans('messages.product')}}</h3>
            <div class="agileinfo_new_products_grids">
                @forelse ($products as $product)
                    @php
                        $linkProduct = "storage/product/".$product->image;
                    @endphp
                        <div class="col-md-3 agileinfo_new_products_grid">
                            <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div class="hs-wrapper hs-wrapper1">
                                    <img src="{{asset($linkProduct)}}" alt="{{$product->name}}" class="img-responsive" />
                                    <img src="{{asset($linkProduct)}}" alt="{{$product->name}}" class="img-responsive" />
                                    <img src="{{asset($linkProduct)}}" alt="{{$product->name}}" class="img-responsive" />
                                    <img src="{{asset($linkProduct)}}" alt="{{$product->name}}" class="img-responsive" />
                                    <img src="{{asset($linkProduct)}}" alt="{{$product->name}}" class="img-responsive" />
                                    <div class="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <a href="{{route('frontend.detail', $product->id)}}" data-toggle="modal" data-target="#myModal" class="showCommonModel" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{route('frontend.product.detail', $product->id)}}">{{$product->name}}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><i class="item_price">{{number_format($product->price, 0, ',', '.')}} {{trans('messages.money')}}</i></p>
                                    <div>
                                        <a href="{{route('cart.product', $product->id)}}" class="w3ls-cart">{{trans('messages.add_to_cart')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @empty
                    <h1 class="text-center">{{trans('messages.no_data')}}</h1>
                @endforelse
                <div class="col-xs-12 text-center">
                    {{ $products->links() }}
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //new-products -->
    <!-- top-brands -->
    @if(count($brands) > 0)
        <div class="top-brands">
            <div class="container">
                <h3>{{trans('messages.brands')}}</h3>
                <div class="sliderfig">
                    <ul id="flexiselDemo1">
                        @foreach($brands as $brand)
                            @php
                                $linkBrand = "storage/brand/".$product->image;
                            @endphp
                            <li>
                                <img src="{{route('brand.image',$brand->id)}}" alt="{{$brand->name}}" class="img-responsive" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <!-- //top-brands -->
    @push('scripts')
    <script type="text/javascript" src="{{asset('js/fontend/jquery.flexisel.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#flexiselDemo1").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems:2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    @endpush
@endsection