@extends('admin.layouts.mini')
@section('title', 'category')
@section('content')
    <div class="inner-block">
        <div class="error-404">
            <div class="error-page-left">
                <img src="{{asset('images/403.jpg')}}" alt="">
            </div>
            <div class="error-right">
                <h2>{{trans('messages.permi')}}</h2>
            </div>
        </div>
    </div>
@endsection