@extends('admin.layouts.mini  ')
@section('title', 'category')
@section('content')
    <div class="inner-block">
        <div class="error-404">
            <div class="error-page-left">
                <img src="{{asset('images/404.png')}}" alt="">
            </div>
            <div class="error-right">
                <h2>{{trans('messages.error_page')}}</h2>
                <h4>{{trans('messages.page_not_fount')}}</h4>
                <a href="{{url('/')}}">{{trans('messages.return_home')}}</a>
            </div>
        </div>
    </div>
@endsection