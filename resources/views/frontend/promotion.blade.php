@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <!-- modal-video -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog common_ajax" role="document" style="margin-top: 0px;">

        </div>
    </div>
    <!-- //modal-video -->

    <!-- new-products -->
    <div class="new-products">
        <div class="container">
            <h3>{{trans('messages.product_promotion')}}</h3>
            <div class="agileinfo_new_products_grids">
                @forelse ($products as $product)
                    <div class="col-md-3 agileinfo_new_products_grid">
                        <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                            <div class="hs-wrapper hs-wrapper1">
                                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
                                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
                                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
                                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
                                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
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