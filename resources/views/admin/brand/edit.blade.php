@extends('admin.layouts.app')
@section('title', 'edit brand')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.edit_brand')}}</h2>
            </div>
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
            <div class="col-md-12 product-grid">
                <form action="{{route('brand.edit', $brand->id)}}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT')}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">{{trans('messages.name_brand')}}</label>
                        <input type="text" class="form-control <?php echo $errors->has('desc') ? 'input-error' : '';?>" name="desc" value="{{$brand->name}}" placeholder="Nhập hãng">
                    </div>
                    <div class="form-group">
                        <div class="show_image">
                            <img src="{{route('brand.image', $brand->id)}}" class="img-responsive" alt="{{$brand->name}}" style="max-width: 300px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">{{trans('messages.image')}} </label>
                        <input type="file" class="form-control <?php echo $errors->has('image-service') ? 'input-error' : '';?>" name="image-service">
                    </div>
                    <button type="submit" class="btn btn-primary submit-form">{{trans('messages.edit_brand')}}</button>
                </form>
                <form action="{{route('brand.delete', $brand->id)}}" class="form-edit" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger" value="{{trans('messages.delete_brand')}}">
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection