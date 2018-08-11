@extends('admin.layouts.app')
@section('title', 'product')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.list_product_lable')}}
                    <a href="{{route('product.add.form')}}" class="pull-right btn btn-primary">{{trans('messages.add_product_lable')}}</a>
                </h2>
            </div>
            @forelse ($products as $product)
                <div class="item  col-xs-6 col-sm-4 col-md-3 service">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" />
                        <div class="caption">
                            <h3 class="group inner list-group-item-heading text-center">{{$product->name}}</h3>
                            <p class="lead text-center">@php echo number_format($product->price, 0 , ',', '.'); @endphp {{trans('messages.money')}}</p>
                            <p>
                                <a class="btn btn-success showCommonModel" data-toggle="modal" data-target="#service_model" href="{{route('product.detail', $product->id)}}">{{trans('messages.detail_lable')}}</a>
                                <a class="btn btn-warning pull-right" href="{{route('product.edit.form', $product->id)}}">{{trans('messages.edit_lable')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-center">{{trans('messages.no_data')}}</h1>
            @endforelse
            <div class="col-xs-12 text-center">
                {{ $products->links() }}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade common_ajax" id="service_model"></div><!-- /.modal -->
@endsection