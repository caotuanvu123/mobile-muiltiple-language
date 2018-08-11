@extends('admin.layouts.app')
@section('title', 'brand')
@section('content')
    <div class="inner-block">
        <h2>{{trans('messages.brands')}}
            <a href="{{route('brand.add.form')}}" class="pull-right btn btn-primary">{{trans('messages.add_brand')}}</a>
        </h2>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>{{trans('messages.stt_lable')}}</th>
                <th>{{trans('messages.name_brand')}}</th>
                <th>{{trans('messages.image')}}</th>
                <th width="80px"></th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @forelse($brands as $brand)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$brand->name}}</td>
                    <td><img src="{{route('brand.image',$brand->id)}}" alt="" class="img-responsive" style="max-width: 200px;"></td>
                    <td><a href="{{route('brand.edit.form', $brand->id)}}" class="btn btn-warning ">{{trans('messages.edit_brand')}}</a></td>
                </tr>
                @php
                    $i++;
                @endphp
            @empty
                <tr>
                    <td colspan="12"><h2 class="text-center no_data">{{ trans('messages.no_data') }}</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <!-- pagination -->
        <div class="row text-center">
            {{ $brands->links() }}
        </div>
    </div>
@endsection