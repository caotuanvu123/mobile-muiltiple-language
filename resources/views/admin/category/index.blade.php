@extends('admin.layouts.app')
@section('title', 'category')
@section('content')
    <div class="inner-block">
        <h2>{{trans('messages.list_category')}}
            <a href="{{route('category.add.form')}}" class="pull-right btn btn-primary">{{trans('messages.add_category')}}</a>
        </h2>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>{{trans('messages.stt_lable')}}</th>
                <th>Danh mục</th>
                <th>Category name</th>
                <th width="80px"></th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @forelse($categories as $category)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$category->name_vi}}</td>
                    <td>{{$category->name_en}}</td>
                    <td><a href="{{route('category.edit.form', $category->id)}}" class="btn btn-warning ">{{trans('messages.edit_lable')}}</a></td>
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection