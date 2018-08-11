@extends('admin.layouts.app')
@section('title', 'Edit category')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.edit_category')}}</h2>
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
                <form action="{{route('category.edit', $category->id)}}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#lang-vi" data-toggle="tab"><img src="{{asset('images/vi.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px"> Tiếng Việt</a></li>
                            <li class=""><a href="#lang-la" data-toggle="tab"><img src="{{asset('images/lao.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px"> English</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="lang-vi">
                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <input type="text" class="form-control <?php echo $errors->has('desc_vi') ? 'input-error' : '';?>" name="desc_vi" value="{{$category->name_vi}}" placeholder="Nhập danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="trumbowyg" name="content_vi">{{$category->desc_vi}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane " id="lang-la">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" class="form-control <?php echo $errors->has('desc_la') ? 'input-error' : '';?>" name="desc_la" value="{{$category->name_en}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea class="trumbowyg" name="content_la">{{$category->desc_en}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning submit-form">{{trans('messages.edit_category')}}</button>
                </form>
                <form action="{{route('category.delete', $category->id)}}" class="form-edit" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger" value="{{trans('messages.delete_category')}}">
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection