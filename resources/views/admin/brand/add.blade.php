@extends('admin.layouts.app')
@section('title', 'Add brand')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.add_brand')}}</h2>
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
                <form action="{{route('brand.add')}}" method="POST" role="form" class="form-add-info" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">{{trans('messages.name_brand')}}</label>
                        <input type="text" class="form-control <?php echo $errors->has('desc') ? 'input-error' : '';?>" name="desc" value="{{old('desc')}}" placeholder="Nhập hãng">
                    </div>
                    <div class="form-group">
                        <div class="show_image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">{{trans('messages.image')}} </label>
                        <input type="file" class="form-control <?php echo $errors->has('image-service') ? 'input-error' : '';?>" name="image-service">
                    </div>
                    <button type="submit" class="btn btn-primary submit-form">{{trans('messages.add_brand')}}</button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection