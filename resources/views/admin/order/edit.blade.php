@extends('admin.layouts.app')
@section('title', 'order')
@section('content')
    <div class="inner-block">
        <div class="col-md-12 product-grid">
            <form action="{{route('order.edit', $id)}}" method="post" role="form" class="form-add-info">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">{{trans('messages.status')}}</label>
                    <select class="form-control <?php echo $errors->has('status') ? 'input-error' : '';?>" name="status">
                        <option value="{{\App\Order::PAID}}">{{trans('messages.paid')}}</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning submit-form">{{trans('messages.edit_lable')}}</button>
            </form>
        </div>
        <h2>{{trans('messages.list_product_lable')}}</h2>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>{{trans('messages.name_product_lable')}}</th>
                <th>{{trans('messages.quantity')}}</th>
                <th width="80px"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->total}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12"><h2 class="text-center no_data">{{ trans('messages.no_data') }}</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection