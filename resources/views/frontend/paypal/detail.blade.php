@extends('frontend.layouts.app')
@section('title', 'paypal')
@section('content')
    <h2>Thông tin hóaơn thanh toán</h2>
    <p><strong>Mã thanh toán</strong> : {{$paypal['id']}}</p>
    <p><strong>Trạng thái</strong> : {{$paypal['state'] == 'approved' ? trans('messages.success') : trans('messages.fail')}}}</p>
    <p>Thông tin người gửi :</p>
    <ul>
        <li><strong>Email</strong> : {{$paypal['payer']['payer_info']['email']}}</li>
        <li><strong>Họ và tên</strong> : {{$paypal['payer']['payer_info']['first_name']}} {{$paypal['payer']['payer_info']['last_name']}}</li>
        <li><strong>ID paypal</strong> : {{$paypal['payer']['payer_info']['payer_id']}}</li>
    </ul>
    <p>Thông tin người nhận :</p>
    <ul>
        <li><strong>Họ tên</strong> : {{$paypal['payer']['payer_info']['shipping_address']['recipient_name']}}</li>
        <li><strong>Địa chỉ</strong> : {{$paypal['payer']['payer_info']['recipient_name']['line1']}} {{$paypal['payer']['payer_info']['recipient_name']['city']}}</li>
        <li><strong>ID paypal</strong> : {{$paypal['payer']['payer_info']['payer_id']}}</li>
    </ul>
    <p>Thông tin đơn hàng : </p>
    <p><strong>Tổng tiền : {{$paypal['transactions'][0]['amount']['total']}} {{$paypal['transactions'][0]['amount']['currency']}}</strong></p>
    <p><strong>Thông tin sản phẩm</strong></p>
    <ul>
    @foreach($paypal['transactions'][0]['item_list']['items'] as $v)
        <li>Tên sản phẩm : {{$v->name}}</li>
        <li>Giá : {{$v->price}} {{$v->currency}}</li>
        <li>Số lượng : {{$v->quantity}}</li>
    @endforeach
    </ul>
@endsection