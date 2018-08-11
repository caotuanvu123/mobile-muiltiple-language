@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <!-- banner -->
    <div class="banner banner2">
        <div class="container">
            <h2>{{trans('messages.top_sale')}} <span>{{trans('messages.gadgets')}}</span><i>25% {{trans('messages.discount')}}</i></h2>
        </div>
    </div>
    <!-- mobiles -->
    <div class="mobiles">
        <div class="container">
            <div class="w3ls_mobiles_grids">
                <div class="col-md-4 w3ls_mobiles_grid_left">
                    <div class="w3ls_mobiles_grid_left_grid">
                        <h3>{{trans('messages.category_lable')}}</h3>
                        <div class="w3ls_mobiles_grid_left_grid_sub">
                            <ul class="panel_bottom">
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <li><a href="{{route('frontend.product', $category->id)}}">{{$category->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 w3ls_mobiles_grid_right">
                    <div class="col-md-6 w3ls_mobiles_grid_right_left">
                        <div class="w3ls_mobiles_grid_right_grid1">
                            <img src="{{asset('images/frontend/48.jpg')}}" alt=" " class="img-responsive" />
                            <div class="w3ls_mobiles_grid_right_grid1_pos1">
                                <h3>{{trans('messages.opening')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 w3ls_mobiles_grid_right_left">
                        <div class="w3ls_mobiles_grid_right_grid1">
                            <img src="{{asset('images/frontend/49.jpg')}}" alt=" " class="img-responsive" />
                            <div class="w3ls_mobiles_grid_right_grid1_pos">
                                <h3>{{trans('messages.top_sale')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="w3ls_mobiles_grid_right_grid3" style="margin-top: 20px;">
                        @forelse ($products as $product)
                            <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles" style="margin-bottom: 20px;">
                                <div class="agile_ecommerce_tab_left mobiles_grid">
                                    <div class="hs-wrapper hs-wrapper2">
                                        <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
                                        <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                            <ul>
                                                <li>
                                                    <a href="{{route('frontend.detail', $product->id)}}" data-toggle="modal" data-target="#myModal" class="showCommonModel" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><a href="{{route('frontend.detail', $product->id)}}">{{$product->name}}</a></h5>
                                    <div class="simpleCart_shelfItem">
                                        <p><i class="item_price">{{number_format($product->price, 0, ',', '.')}} {{trans('messages.money')}}</i></p>
                                        <div>
                                            <a href="{{route('cart.product', $product->id)}}" class="w3ls-cart">{{trans('messages.add_to_cart')}}</a>
                                        </div>
                                    </div>
                                    <div class="mobiles_grid_pos">
                                        <h6>{{trans('messages.new')}}</h6>
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
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>


    <!-- modal-video -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog common_ajax" role="document" style="margin-top: 0px;">

        </div>
    </div>
    <!-- //modal-video -->
@endsection