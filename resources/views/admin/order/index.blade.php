@extends('admin.layouts.app')
@section('title', 'order')
@section('content')
    <div class="inner-block">
        <h2>{{trans('messages.list_order_lable')}}</h2>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>{{trans('messages.time')}}</th>
                <th>{{trans('messages.name_customer')}}</th>
                <th>{{trans('messages.email')}}</th>
                <th>{{trans('messages.status')}}</th>
                <th>{{trans('messages.total_price')}}</th>
                <th width="80px"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{$order->updated_at}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->mail}}</td>
                    <td>{{$order->type == \App\Order::PAID ? trans('messages.paid') : trans('messages.unpaid')}}</td>
                    <td>{{number_format($order->price, 0, ',', '.')}} {{trans('messages.money')}}</td>
                    <td><a href="{{route('order.edit.form', $order->id)}}" class="btn btn-warning ">{{trans('messages.edit_lable')}}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="12"><h2 class="text-center no_data">{{ trans('messages.no_data') }}</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <!-- pagination -->
        <div class="row text-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection