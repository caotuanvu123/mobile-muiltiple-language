@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <div class="container">
        <div class="error">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <table class="table table-bordered" style="margin-top: 50px;">
            <thead>
            <tr>
                <th>{{trans('messages.stt_lable')}}</th>
                <th>{{trans('messages.image')}}</th>
                <th>{{trans('messages.product')}}</th>
                <th>{{trans('messages.quantity')}}</th>
                <th>{{trans('messages.price_product_lable')}}</th>
                <th>{{trans('messages.total_money')}}</th>
                <th width="80px"></th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                    $total = 0;
                @endphp
                @forelse($carts as $cart)
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="{{$cart->options->image}}" style="max-height: 50px;" alt="{{$cart->name}}"></td>
                        <td>{{$cart->name}}</td>
                        <td>
                            <form action="{{route('cart_update', $cart->rowId)}}" method="post" enctype="multipart/form-data">
                                {{ method_field('PUT')}}
                                {{ csrf_field() }}
                                <input type="number" name="quantity" value="{{$cart->qty}}">
                                <button type="submit"><i class="fa fa-repeat" aria-hidden="true"></i></button>
                            </form>
                        </td>
                        <td>{{number_format($cart->price, 0, ',', '.')}} {{trans('messages.money')}}</td>
                        <td>{{number_format($cart->subtotal, 0, ',', '.')}} {{trans('messages.money')}}</td>
                        <td><a href="{{route('cart_delete', $cart->rowId)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                    @php
                        {{$i ++;}}
                        $total = $total + $cart->subtotal;
                    @endphp
                @empty
                    <tr>
                        <td colspan="6">{{trans('messages.no_data')}}</td>
                    </tr>
                @endforelse
                    <tr>
                        <td colspan="6">{{trans('messages.total_price')}}</td>
                        <td>{{number_format($total, 0, ',', '.')}} {{trans('messages.money')}}</td>
                    </tr>
            </tbody>
        </table>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#lang-vi" data-toggle="tab">Đặt hàng</a></li>
                <li class=""><a href="#lang-la" data-toggle="tab">Đặt hàng và thanh toán</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="lang-vi">
                    <form action="{{route('cart_order')}}" method="post" style="margin: 30px 0px;">
                        {{ csrf_field() }}
                        @auth
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{trans('messages.email_lable')}}</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value=" {{\Auth::user()->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{trans('messages.first_name_last_name_lable')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  name="name" value=" {{\Auth::user()->name}}">
                            </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{trans('messages.email_lable')}}</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}" placeholder="{{trans('messages.email_lable')}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.first_name_last_name_lable')}}</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.first_name_last_name_lable')}}" name="name" value="{{old('name')}}">
                                </div>
                                @endauth
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.address')}}</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.address')}}" name="address" value="{{old('address')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.phone')}}</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.phone')}}" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="exampleInputPassword1" name="price" value="{{$total}}">
                                </div>

                                <button type="submit" class="btn btn-success">{{trans('messages.customer_order')}}</button>
                    </form>
                </div>
                <div class="tab-pane " id="lang-la">
                    <form action="{{route('paypal_order')}}" method="post" style="margin: 30px 0px;">
                        {{ csrf_field() }}
                        @auth
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{trans('messages.email_lable')}}</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value=" {{\Auth::user()->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{trans('messages.first_name_last_name_lable')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  name="name" value=" {{\Auth::user()->name}}">
                            </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{trans('messages.email_lable')}}</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}" placeholder="{{trans('messages.email_lable')}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.first_name_last_name_lable')}}</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.first_name_last_name_lable')}}" name="name" value="{{old('name')}}">
                                </div>
                                @endauth
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.address')}}</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.address')}}" name="address" value="{{old('address')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{trans('messages.phone')}}</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="{{trans('messages.phone')}}" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="exampleInputPassword1" name="price" value="{{$total}}">
                                </div>

                                <button type="submit" class="btn btn-success"><i class="fa fa-cc-paypal" aria-hidden="true"></i>{{trans('messages.customer_order')}}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection