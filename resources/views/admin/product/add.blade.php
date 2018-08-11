@extends('admin.layouts.app')
@section('title', 'Add product')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.add_product_lable')}}</h2>
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
                <form action="{{route('product.add')}}" method="POST" role="form" class="form-add-info" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#lang-vi" data-toggle="tab"><img src="{{asset('images/vi.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px"> Tiếng Việt</a></li>
                            <li class=""><a href="#lang-la" data-toggle="tab"><img src="{{asset('images/lao.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px">English</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="lang-vi">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" class="form-control <?php echo $errors->has('desc_vi') ? 'input-error' : '';?>" name="desc_vi" value="{{old('desc_vi')}}" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="">{{trans('messages.quantity')}}</label>
                                    <input type="number" class="form-control <?php echo $errors->has('quantity') ? 'input-error' : '';?>" name="quantity" value="{{old('quantity')}}" placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="">{{trans('messages.price_product_lable')}}</label>
                                    <input type="text" class="form-control <?php echo $errors->has('price') ? 'input-error' : '';?>" name="price" value="{{old('price')}}" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="">{{trans('messages.category_lable')}}</label>
                                    <select class="form-control data-select-all <?php echo $errors->has('category') ? 'input-error' : '';?>" name="category">
                                        @if(count($categories) > 0)
                                            <option value="">{{trans('messages.choose_category')}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{old('category') == $category->id ?'selected':''}}>{{$category->name_vi}} - {{$category->name_en}}</option>
                                            @endforeach
                                        @else
                                            <option value="">{{trans('messages.no_category')}}</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{trans('messages.promotion_lable')}}</label>
                                    <select class="form-control <?php echo $errors->has('promotion') ? 'input-error' : '';?>" name="promotion">
                                        <option value="{{\App\Product::UN_PROMONTION}}">Sản phẩm không có khuyến mãi</option>
                                        <option value="{{\App\Product::PROMONTION}}">Sản phẩm có khuyến mãi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{trans('messages.brands')}}</label>
                                    <select class="form-control data-select-all <?php echo $errors->has('brand') ? 'input-error' : '';?>" name="brand">
                                        @if(count($brands) > 0)
                                            <option value="">{{trans('messages.choose_brand')}}</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}" {{old('brand') == $brand->id ?'selected':''}}>{{$brand->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">{{trans('messages.no_brand')}}</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="show_image">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{trans('messages.image')}} </label>
                                    <input type="file" class="form-control <?php echo $errors->has('image-service') ? 'input-error' : '';?>" name="image-service">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="trumbowyg" name="content_vi">{{old('content_vi')}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane " id="lang-la">
                                <div class="form-group">
                                    <label for="">product name</label>
                                    <input type="text" class="form-control <?php echo $errors->has('desc_la') ? 'input-error' : '';?>" name="desc_la" value="{{old('desc_la')}}">
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea class="trumbowyg" name="content_la">{{old('content_la')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-form">Thêm</button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection